<div id="{{ $id ?? 'dropzone-wrapper' }}" class="flex items-center justify-center w-full">
    <label for="{{ $inputId ?? 'dropzone-file' }}"
        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 transition">
        @if (trim($slot) != '')
            {{ $slot }}
        @else
            <div class="flex flex-col items-center justify-center pt-5 pb-6 px-4 text-center">
                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                </svg>
                
                <div id="{{ $previewId ?? 'file-preview' }}" class="hidden w-full">
                    <div class="flex items-center justify-center">
                        <div class="preview-container mb-2">
                            <img id="{{ $previewImageId ?? 'preview-image' }}" class="max-h-32 max-w-full rounded" src="" alt="File preview">
                        </div>
                    </div>
                    <p id="{{ $fileNameId ?? 'file-name' }}" class="text-sm text-gray-500 dark:text-gray-400 break-all"></p>
                </div>
                
                <div id="{{ $uploadPromptId ?? 'upload-prompt' }}">
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                        <span class="font-semibold">Click to upload</span> or drag and drop
                    </p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                </div>
            </div>
        @endif
        <input id="{{ $inputId ?? 'dropzone-file' }}" type="file" class="hidden" />
    </label>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const dropArea = document.querySelector('label[for="{{ $inputId ?? 'dropzone-file' }}"]');
        const fileInput = document.getElementById('{{ $inputId ?? 'dropzone-file' }}');
        const filePreview = document.getElementById('{{ $previewId ?? 'file-preview' }}');
        const uploadPrompt = document.getElementById('{{ $uploadPromptId ?? 'upload-prompt' }}');
        const previewImage = document.getElementById('{{ $previewImageId ?? 'preview-image' }}');
        const fileName = document.getElementById('{{ $fileNameId ?? 'file-name' }}');
        
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(event => {
            dropArea.addEventListener(event, e => {
                e.preventDefault();
                e.stopPropagation();
            }, false);
        });
        
        ['dragenter', 'dragover'].forEach(event => {
            dropArea.addEventListener(event, () => {
                dropArea.classList.add('ring-2', 'ring-blue-500');
            }, false);
        });

        ['dragleave', 'drop'].forEach(event => {
            dropArea.addEventListener(event, () => {
                dropArea.classList.remove('ring-2', 'ring-blue-500');
            }, false);
        });
        
        function handleFile(file) {
            fileName.textContent = file.name;
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    previewImage.src = e.target.result;
                    previewImage.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                previewImage.src = '';
                previewImage.classList.add('hidden');
            }
        
            filePreview.classList.remove('hidden');
            uploadPrompt.classList.add('hidden');
            const customEvent = new CustomEvent('file-dropped', {
                detail: file,
                bubbles: true
            });
            
            dropArea.dispatchEvent(customEvent);
        }
        
        dropArea.addEventListener('drop', e => {
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                fileInput.files = files;
                handleFile(files[0]);
            }
        });
        
        fileInput.addEventListener('change', () => {
            if (fileInput.files.length > 0) {
                handleFile(fileInput.files[0]);
            }
        });
    });
</script>