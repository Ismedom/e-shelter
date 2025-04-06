
<div class="max-w-sm mx-auto grid place-items-center">
    <div class="flex mb-2 space-x-2 rtl:space-x-reverse">
        <div>
            <label for="code-1" class="sr-only">First code</label>
            <input 
                type="text" 
                maxlength="1" 
                autocomplete="off"
                data-focus-input-init
                data-focus-input-next="code-2" 
                id="code-1" 
                class="block w-9 h-9 py-3 text-sm font-extrabold text-center text-gray-900 bg-white border border-gray-200 rounded focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                required
                name="code_1"
                />
        </div>
        <div>
            <label for="code-2" class="sr-only">Second code</label>
            <input 
                type="text" 
                maxlength="1" 
                autocomplete="off"
                data-focus-input-init
                data-focus-input-prev="code-1" 
                data-focus-input-next="code-3" 
                id="code-2"
                class="block w-9 h-9 py-3 text-sm font-extrabold text-center text-gray-900 bg-white border border-gray-200 rounded focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                required
                name="code_2"
                />
        </div>
        <div>
            <label for="code-3" class="sr-only">Third code</label>
            <input 
                type="text" 
                maxlength="1" 
                autocomplete="off"
                data-focus-input-init
                data-focus-input-prev="code-2" 
                data-focus-input-next="code-4" 
                id="code-3" 
                class="block w-9 h-9 py-3 text-sm font-extrabold text-center text-gray-900 bg-white border border-gray-200 rounded focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                required
                name="code_3"
                />
        </div>
        <div>
            <label for="code-4" class="sr-only">Fourth code</label>
            <input 
                type="text" 
                maxlength="1" 
                autocomplete="off"
                data-focus-input-init
                data-focus-input-prev="code-3" 
                data-focus-input-next="code-5" 
                id="code-4" 
                class="block w-9 h-9 py-3 text-sm font-extrabold text-center text-gray-900 bg-white border border-gray-200 rounded focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                required
                name="code_4"
                />
        </div>
        <div>
            <label for="code-5" class="sr-only">Fifth code</label>
            <input 
                type="text" 
                maxlength="1" 
                autocomplete="off"
                data-focus-input-init
                data-focus-input-prev="code-4" 
                data-focus-input-next="code-6" 
                id="code-5" 
                class="block w-9 h-9 py-3 text-sm font-extrabold text-center text-gray-900 bg-white border border-gray-200 rounded focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                required
                name="code_5"
                />
        </div>
        <div>
            <label for="code-6" class="sr-only">Sixth code</label>
            <input 
                type="text" 
                maxlength="1" 
                autocomplete="off"
                data-focus-input-init
                data-focus-input-prev="code-5" 
                id="code-6" 
                class="block w-9 h-9 py-3 text-sm font-extrabold text-center text-gray-900 bg-white border border-gray-200 rounded focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                required
                name="code_6"
                />
        </div>
    </div>
</div>

<script>
    
function focusNextInput(el, prevId, nextId) {
    if (el.value.length === 0) {
        if (prevId) {
            document.getElementById(prevId).focus();
        }
    } else {
        if (nextId) {
            document.getElementById(nextId).focus();
        }
    }
}

document.querySelectorAll('[data-focus-input-init]').forEach(function(element) {
    element.addEventListener('keyup', function() {
        const prevId = this.getAttribute('data-focus-input-prev');
        const nextId = this.getAttribute('data-focus-input-next');
        focusNextInput(this, prevId, nextId);
    });

    element.addEventListener('paste', function(event) {
        event.preventDefault();
        const pasteData = (event.clipboardData || window.clipboardData).getData('text');
        const digits = pasteData.replace(/\D/g, ''); 

        const inputs = document.querySelectorAll('[data-focus-input-init]');
        inputs.forEach((input, index) => {
            if (digits[index]) {
                input.value = digits[index];
                const nextId = input.getAttribute('data-focus-input-next');
                if (nextId) {
                    document.getElementById(nextId).focus();
                }
            }
        });
    });
});

</script>