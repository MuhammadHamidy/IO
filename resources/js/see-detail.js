const clickDetail = document.getElementsByClassName('click-detail');

Array.from(clickDetail).map(value => {
    value.addEventListener('click', () => {
        const sibling = value.nextElementSibling;
        const labelButton = value.children[0].children[0];
        labelButton.classList.toggle('rotate-90')
        sibling.classList.toggle('hidden');
        sibling.classList.toggle('flex');
    });
});