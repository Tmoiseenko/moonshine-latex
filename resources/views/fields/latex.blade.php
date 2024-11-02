<div x-data="latexComponent()">
    <x-moonshine::grid>
        <x-moonshine::column adaptiveColSpan="6" colSpan="6">
            <div
                @class(['code-container', 'form-invalid' => formErrors($errors, $element->getFormName())->has($element->name())])
            >
                <div
                    x-model="text"
                    x-data="code({
        lineNumbers: {{ $element->lineNumbers ? 'true' : 'false' }},
        language: '{{ $element->language ?? 'js' }}',
        readonly: {{ $element->isReadonly() ? 'true' : 'false' }},
    })"
                    {{ $element->attributes()
                        ->only('class')
                        ->merge(['class' => 'w-100 min-h-[300px] relative']) }}
                ></div>

                <x-moonshine::form.textarea

                    style="display: none;"
                    :attributes="$element->attributes()->merge([
        'aria-label' => $element->label() ?? '',
        'name' => $element->name(),
        'class' => 'code-source'
    ])"
                >{!! $value ?? '' !!}</x-moonshine::form.textarea>
            </div>
        </x-moonshine::column>
        <x-moonshine::column adaptiveColSpan="6" colSpan="6">
            <div id="latex-{{ $element->column() }}">
            </div>
        </x-moonshine::column>
    </x-moonshine::grid>

    <script>
        function latexComponent() {
            return {
                text: '',
                renderLatex() {
                    try {
                        let generator = new latexjs.HtmlGenerator({ hyphenate: false })
                        generator = latexjs.parse(this.text, { generator: generator })
                        document.head.appendChild(generator.stylesAndScripts("https://cdn.jsdelivr.net/npm/latex.js@0.12.4/dist/"))
                        let latexContainer = document.getElementById("latex-{{ $element->column() }}")
                        latexContainer.innerHTML = ''
                        latexContainer.appendChild(generator.domFragment())
                    } catch (e) {
                        console.log('Ошибка при рендеринге: ' + e.message)
                    }
                },
                init() {
                    this.$watch('text', () => this.renderLatex());
                }
            }
        }
    </script>
</div>
