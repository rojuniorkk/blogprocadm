var COUNT_ELEMENT = 0;

function newElement() {
    COUNT_ELEMENT++;

    let ELEMENTS_DIV = document.getElementById("elements");
    ELEMENTS_DIV.insertAdjacentHTML(
        "beforeend",
        `
          <section class="flex flex-col  border-2 rounded-lg p-4">
                                <section class="flex flex-col gap-y-4">
                                    <input type="text" name="elements[${COUNT_ELEMENT}][title]" class="border-0 border-b" placeholder="Título" required>
                                    <textarea name="elements[${COUNT_ELEMENT}][content]" class="w-full border-0 border-b p-2" rows="5" placeholder="Conteúdo" required></textarea>

                                    <section>
                                        <input class="block border w-full " type="file" name="elements[${COUNT_ELEMENT}][image]">
                                        <span class="text-sm font-poppins">PNG ou JPG, (Máx. 5MB)</span>
                                    </section>
                                </section>
                            </section>
        `
    );
}

//
window.addEventListener("load", function () {});
