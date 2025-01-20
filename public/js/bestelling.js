
document.addEventListener('DOMContentLoaded', function () {
    const selects = document.querySelectorAll('.grootte');
   
 
    selects.forEach(function (select) {
        select.addEventListener('change', function () {
            const parent = select.closest('.flex-grow');

            const priceElement = parent.querySelector('.prijs');
            const basePrijs = parseFloat(priceElement.dataset.fieldId);

            var pizzaPrijs = basePrijs;
            if (select.value === 'klein') {
                pizzaPrijs = basePrijs;
            } else if (select.value === 'normaal') {
                pizzaPrijs = basePrijs + 2;
            } else if (select.value === 'groot') {
                pizzaPrijs = basePrijs + 4;
            }

            priceElement.textContent = '€ ' + pizzaPrijs.toFixed(2);
        });
    });
});
function toevoegenBestelling(pizzaId, pizzaNaam, buttonElement) {
    const parent = buttonElement.closest('.flex-grow');

    const grootteSelect = parent.querySelector('.grootte');
    const aantalInput = parent.querySelector(`#aantal-${pizzaId}`);
    const prijsElement = parent.querySelector('.prijs');

    const grootte = grootteSelect.value;
    const aantal = parseInt(aantalInput.value) || 0;
    const pizzaPrijs = parseFloat(prijsElement.textContent.replace('€', '').trim());

    updateBestelling(pizzaNaam, grootte, aantal, pizzaPrijs * aantal);
}

// Functie om de bestelling te renderen in de "Uw Bestelling" sectie
function updateBestelling(pizzaNaam, grootte, aantal, totaalprijs) {

}

function verwijderBestelling(bestellingId) {

}

