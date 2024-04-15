const form = document.getElementById('matkul-form');
const checkboxes = form.querySelectorAll('input[type="checkbox"]');
let totalSKS = 0;

checkboxes.forEach((checkbox) => {
    checkbox.addEventListener('change', () => {
        totalSKS = 0;
        checkboxes.forEach((cb) => {
            if (cb.checked) {
                totalSKS += parseInt(cb.getAttribute('data-sks'));
            }
        });
        if (totalSKS > 9) {
            alert('Total SKS melebihi 9. Silakan pilih maksimal 9 SKS.');
            checkbox.checked = false;
            totalSKS -= parseInt(checkbox.getAttribute('data-sks'));
        }
    });
});