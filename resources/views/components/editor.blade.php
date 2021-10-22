<div>
    @push('head')
        <style>
            .codex-editor .ce-block__content, .codex-editor .ce-toolbar__content {
                max-width: 95%;
            }
        </style>
    @endpush
    <div id="editorjs"></div>
    <input type="hidden" id="content_blocks" name="content_blocks" />
    @push('scripts')
        <script src="arcanely-editor/js/bundle.js"></script>
        <script type="text/javascript">

            /**
             * Polyfill for Element.closest()
             */
            if (!Element.prototype.matches) {
            Element.prototype.matches = Element.prototype.msMatchesSelector || 
                                        Element.prototype.webkitMatchesSelector;
            }
            if (!Element.prototype.closest) {
                Element.prototype.closest = function(s) {
                    var el = this;

                    do {
                        if (Element.prototype.matches.call(el, s)) return el;
                        el = el.parentElement || el.parentNode;
                    } while (el !== null && el.nodeType === 1);
                        return null;
                };
            }

            @if (isset($saveBtnId))
                let save = document.querySelector("#{{ $saveBtnId }}");
                save.addEventListener("click", function(e) {
                    e.preventDefault();
                    console.log("Saving...");
                    editor.save().then(function(data) {
                        console.log("Save Complete.");
                        document.querySelector("#content_blocks").value = JSON.stringify(data);
                        save.closest('form').submit();
                    })
                });
            @else
                console.error("Must pass saveBtnId to component.");
            @endif

            var editorConfig = {
            holder: {{ config('editor.holder') }}, // Id of Element that should contain Editor instance
            onReady: () => {
                new ArcanelyEditor.DragDrop(editor);
            },
            tools: {!! $toolsToJsObject() !!},
            @if (old('content_blocks'))
                data: {!! old('content_blocks') !!}
            @endif
            };

            const editor = new EditorJS(editorConfig);
        </script>
    @endpush
</div>