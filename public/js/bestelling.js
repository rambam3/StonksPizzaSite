
document.addEventListener('DOMContentLoaded', function () {
    const selects = document.querySelectorAll('.grootte');
   
 
    selects.forEach(function (select) {
        select.addEventListener('change', function () {
            const parent = select.closest('.flex-grow');

            const priceElement = parent.querySelector('.prijs');
            const basePrijs = parseFloat(priceElement.dataset.fieldId);

            var pizzaPrijs = basePrijs;
            if (select.value === 'klein') {
                pizzaPrijs = basePrijs * 0.8;
            } else if (select.value === 'normaal') {
                pizzaPrijs = basePrijs * 1;
            } else if (select.value === 'groot') {
                pizzaPrijs = basePrijs * 1.2;
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

    if (aantal > 0) {
        updateBestelling(pizzaNaam, grootte, aantal, pizzaPrijs * aantal);
        updateTotaalPrijs();
        plaatsBestelling(pizzaNaam, grootte, aantal, pizzaPrijs);
    } else {
        alert("Voer een geldig aantal in.");
    }
}

// Functie om de bestelling in de lijst te tonen
function updateBestelling(pizzaNaam, grootte, aantal, totaalprijs) {
    const bestellingContainer = document.querySelector('.bestelling-lijst');
    
    // Maak een uniek ID voor de bestelling (op basis van naam en grootte)
    const bestellingId = `${pizzaNaam}-${grootte}`.replace(/\s+/g, '-').toLowerCase();
    let bestaandeBestelling = document.getElementById(bestellingId);

    // Get bezorgkosten from the data-cost attribute
    const bezorgKostenElement = document.querySelector('.bezorgkosten-amount');
    const bezorgKosten = parseFloat(bezorgKostenElement.dataset.cost) || 0;

    if (bestaandeBestelling) {
        // Update de bestaande bestelling
        const aantalElement = bestaandeBestelling.querySelector('.bestelling-aantal');
        const totaalElement = bestaandeBestelling.querySelector('.bestelling-totaal');

        const nieuwAantal = parseInt(aantalElement.textContent) + aantal;
        aantalElement.textContent = nieuwAantal + "x";

        // Update the total with bezorgKosten
        const newTotal = totaalprijs + parseFloat(totaalElement.dataset.total);
        totaalElement.textContent = "€" + (newTotal + bezorgKosten).toFixed(2);
        totaalElement.dataset.total = (newTotal + bezorgKosten).toFixed(2);
    } else {
        // Voeg een nieuwe bestelling toe
        const bestellingHTML = `
            <div id="${bestellingId}" class="flex justify-between bg-[#F2EADF] p-4 rounded-lg border border-black shadow-lg mt-4 mb-2">
                <p>${aantal} x</p>
                <div class="flex flex-col items-center">
                    <p>${pizzaNaam} ${grootte}</p>
                    <p class="text-red">
                        <button type="button" class="text-red-500 hover:text-red-700" onclick="verwijderBestelling('${bestellingId}')">
                            Verwijder
                        </button>
                    </p>
                </div>
                <p class="bestelling-totaal" data-total="${totaalprijs.toFixed(2)}">€ ${totaalprijs.toFixed(2)}</p>
            </div>
        `;
        bestellingContainer.innerHTML += bestellingHTML;
    }

    // Update the total price in the summary
    updateTotaalPrijs();
}

// Functie om een bestelling te verwijderen
function verwijderBestelling(bestellingId) {
    const bestellingElement = document.getElementById(bestellingId);
    if (bestellingElement) {
        bestellingElement.remove();
        updateTotaalPrijs();
    }
}
function updateTotaalPrijs() {
    let totaalPrijs = 0;

    // Select all items in the bestelling-lijst
    const bestellingLijst = document.querySelectorAll('.bestelling-lijst .bestelling-totaal');

    // Loop through and sum up the total prices
    bestellingLijst.forEach((totaalElement) => {
        totaalPrijs += parseFloat(totaalElement.dataset.total);
    });

    // Add delivery costs if applicable
    const bezorgKostenElement = document.querySelector('.bezorgkosten-amount');
    const bezorgKosten = parseFloat(bezorgKostenElement.dataset.cost) || 0;

    // Update the totaal section
    const totaalElement = document.querySelector('.totaal-prijs');
    const hiddenTotaalPrijs = document.getElementById('hiddenTotaalPrijs');
    if (totaalElement) {
        totaalElement.textContent = `Totaal: € ${(totaalPrijs + bezorgKosten).toFixed(2)}`;
        hiddenTotaalPrijs.value = (totaalPrijs + bezorgKosten).toFixed(2);
    }
}
function plaatsBestelling(pizzaNaam, grootte, aantal, prijs) {
    // Zorg dat deze velden altijd worden bijgewerkt bij het klikken op Afrekenen
    const bestellingregel = {
        naam: pizzaNaam,
        grootte: grootte,
        aantal: aantal,
        prijs: prijs * aantal,
    };

    // Zorg dat deze velden een array bevatten
    const hiddenBestellingregel = document.getElementById('hiddenBestellingregel');
    const huidigeBestellingregel= hiddenBestellingregel.value ? JSON.parse(hiddenBestellingregel.value) : [];
    huidigeBestellingregel.push(bestellingregel);

    hiddenBestellingregel.value = JSON.stringify(huidigeBestellingregel);

    // Update totaalprijs met eventuele bezorgkosten
    updateTotaalPrijs();

}


