// Tab navigation functions
function nextTab(tabId) {
    $('.nav-tabs a[href="#' + tabId + '"]').tab("show");
}

function prevTab(tabId) {
    $('.nav-tabs a[href="#' + tabId + '"]').tab("show");
}

// Delivery fees for different locations
document.addEventListener("DOMContentLoaded", function () {
    const locations = [
        { name: "Own Delivery", fee: 230 },
        { name: "Harare", fee: 0 },
        { name: "Chitungwiza", fee: 0 },
        { name: "Bulawayo", fee: 390 },
        { name: "Bindura", fee: 38 },
        { name: "Mount Darwin", fee: 110 },
        { name: "Glendale", fee: 9 },
        { name: "Shamva", fee: 47 },
        { name: "Mazowe", fee: 0 },
        { name: "Centenary", fee: 100 },
        { name: "Guruve", fee: 90 },
        { name: "Marondera", fee: 24 },
        { name: "Murehwa", fee: 37 },
        { name: "Ruwa", fee: 0 },
        { name: "Goromonzi", fee: 0 },
        { name: "Mutoko", fee: 93 },
        { name: "Chivhu", fee: 96 },
        { name: "Wedza", fee: 77 },
        { name: "Macheke", fee: 58 },
        { name: "Chinhoyi", fee: 71 },
        { name: "Karoi", fee: 151 },
        { name: "Kariba", fee: 315 },
        { name: "Norton", fee: 0 },
        { name: "Chegutu", fee: 59 },
        { name: "Kadoma", fee: 92 },
        { name: "Banket", fee: 47 },
        { name: "Magunje", fee: 140 },
        { name: "Murombedzi", fee: 33 },
        { name: "Mutare", fee: 215 },
        { name: "Rusape", fee: 120 },
        { name: "Nyanga", fee: 218 },
        { name: "Chipinge", fee: 400 },
        { name: "Chimanimani", fee: 315 },
        { name: "Murambinda", fee: 131 },
        { name: "Birchenough Bridge", fee: 263 },
        { name: "Headlands", fee: 94 },
        { name: "Odzi", fee: 179 },
        { name: "Gweru", fee: 225 },
        { name: "Kwekwe", fee: 163 },
        { name: "Zvishavane", fee: 256 },
        { name: "Shurugwi", fee: 245 },
        { name: "Gokwe", fee: 265 },
        { name: "Mvuma", fee: 142 },
        { name: "Lalapanzi", fee: 180 },
        { name: "Redcliff", fee: 165 },
        { name: "Masvingo", fee: 242 },
        { name: "Chiredzi", fee: 360 },
        { name: "Triangle", fee: 295 },
        { name: "Mwenezi", fee: 320 },
        { name: "Bikita", fee: 200 },
        { name: "Mashava", fee: 240 },
        { name: "Zaka", fee: 265 },
        { name: "Hwange", fee: 664 },
        { name: "Victoria Falls", fee: 822 },
        { name: "Lupane", fee: 487 },
        { name: "Binga", fee: 550 },
        { name: "Dete", fee: 660 },
        { name: "Nkayi", fee: 348 },
        { name: "Tsholotsho", fee: 535 },
        { name: "Gwanda", fee: 466 },
        { name: "Beitbridge", fee: 532 },
        { name: "Plumtree", fee: 522 },
        { name: "Esigodini", fee: 401 },
        { name: "Filabusi", fee: 340 },
    ]; 

    let locationSelect = document.getElementById("delivery-location");
    let feeDisplay = document.getElementById("location-fee"); 

        // Populate dropdown
     locations.forEach((location) => {
        const option = document.createElement("option");
        option.value = location.name;
        option.text = `${location.name} - $${location.fee}`;
        locationSelect.add(option);
    });

    let fee = 0;
    // Function to update the fee display based on selected location
    const updateFeeDisplay = () => {
        const selectedLocation = locationSelect.value;
   // console.log(' location: ',selectedLocation);
        const locationData = locations.find((loc) => loc.name === selectedLocation);

        if (locationData) {
            feeDisplay.textContent = `Delivery Fee: $${locationData.fee}`;
      //      console.log("Updated fee display:", locationData);
            fee = locationData.fee;
        } else {
            console.error("Location data not found for selected location.");
            feeDisplay.textContent = "Delivery Fee: $0";
        }
    };

    // Display initial fee for the default selection
    updateFeeDisplay();

    // Event listener for dropdown selection change
    locationSelect.addEventListener("change", console.log('current fee: $',fee));

      
    function extractAmount(text) {
        // Check if the input is a string
        if (typeof text !== 'string') {
            console.error('Input must be a string');
            return null; // Return null if the input is not a string
        }

        const regex = /\$([\d,]+)/; // Matches dollar amounts
        const match = text.match(regex); // Get the matched amount

        if (match) {
            return parseFloat(match[1].replace(/,/g, '')); // Return the amount as a float
        }

        return null; // Return null if no match is found
    }

    // Example usage 
    let amount2 = extractAmount(feeDisplay.textContent); 
    console.log('fee for deli: ',amount2);  
});

document.addEventListener("DOMContentLoaded", () => {
    const services = document.querySelectorAll(".service-checkbox");

    services.forEach((service) => {
        service.addEventListener("change", function () {
            const serviceId = this.value;
            const sectionId = `service-section-${serviceId}`;

            const existingSection = document.getElementById(sectionId);
            if (existingSection) {
                existingSection.remove();
            }

            if (this.checked) {
                const serviceSection = document.createElement("div");
                serviceSection.classList.add("service-section", "mb-4");
                serviceSection.id = sectionId;

                serviceSection.innerHTML = `
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="input-width-${serviceId}" class="form-label">Width (m)</label>
                            <input type="number" step="0.01" id="input-width-${serviceId}" name="services[${serviceId}][width]" class="form-control" placeholder="Enter width" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="input-height-${serviceId}" class="form-label">Height (m)</label>
                            <input type="number" step="0.01" id="input-height-${serviceId}" name="services[${serviceId}][height]" class="form-control" placeholder="Enter height" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="input-quantity-${serviceId}" class="form-label">Quantity</label>
                            <input type="number" step="1" id="input-quantity-${serviceId}" name="services[${serviceId}][quantity]" class="form-control" placeholder="Enter quantity" required>
                        </div>

                        <div class="col-md-8 mb-3">
                            <label for="select-brand-${serviceId}" class="form-label">Design</label>
                            <select id="select-brand-${serviceId}" class="form-control" name="services[${serviceId}][name]" required>
                                <option value="" disabled selected>Select a design</option>
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="total-price-${serviceId}" class="form-label">Total Price</label>
                            <input type="text" id="total-price-${serviceId}" name="services[${serviceId}][total_price]" class="form-control" readonly>
                        </div>

                        <!-- Hidden input for price_per_m2 -->
                        <input type="hidden" id="price-per-m2-${serviceId}" name="services[${serviceId}][price_per_m2]" value="">
                        <!-- Hidden input for service_name -->
                        <input type="hidden" id="service-name-${serviceId}" name="services[${serviceId}][service_name]" value="">
                    </div>
                `;

                document.getElementById("service-details").appendChild(serviceSection);

                fetch(`/quotation/get-brands/${serviceId}`)
                    .then((response) => response.json())
                    .then((brands) => {
                        const brandSelect = document.getElementById(`select-brand-${serviceId}`);
                        const pricePerM2Input = document.getElementById(`price-per-m2-${serviceId}`);
                        const serviceNameInput = document.getElementById(`service-name-${serviceId}`);

                        brands.forEach((brand) => {
                            const option = document.createElement("option");
                            option.value = brand.price_per_m2;
                            option.textContent = `${brand.name} - $${brand.price_per_m2} per m²`;
                            option.setAttribute("data-brand-name", brand.name); // Add data-brand-name for easy access
                            brandSelect.appendChild(option);
                        });

                        // Set price_per_m2 and formatted service name when a brand is selected
                        brandSelect.addEventListener("change", function() {
                            const selectedOption = brandSelect.options[brandSelect.selectedIndex];
                            // Format service name as "Service-brand-name"
                            serviceNameInput.value = selectedOption.getAttribute("data-brand-name");;
                            pricePerM2Input.value = brandSelect.value; // Set price_per_m2

                            calculateTotal(); // Recalculate total if needed
                        });

                        const widthInput = document.getElementById(`input-width-${serviceId}`);
                        const heightInput = document.getElementById(`input-height-${serviceId}`);
                        const quantityInput = document.getElementById(`input-quantity-${serviceId}`);
                        const totalPriceInput = document.getElementById(`total-price-${serviceId}`);
                        
                        
                        let feeDisplay = document.getElementById("location-fee"); 
                       
                        
                        
                        widthInput.addEventListener("input", calculateTotal);
                        heightInput.addEventListener("input", calculateTotal);
                        quantityInput.addEventListener("input", calculateTotal);

                        function calculateTotal() {
                            const pricePerM2 = parseFloat(pricePerM2Input.value);
                            const width = parseFloat(widthInput.value);
                            const height = parseFloat(heightInput.value);
                            const quantity = parseInt(quantityInput.value) || 1;

                            if (!isNaN(pricePerM2) && !isNaN(width) && !isNaN(height) && !isNaN(quantity)) {
                                const area = width * height;
                                const totalPrice = area * pricePerM2 * quantity;
                                totalPriceInput.value = `$${totalPrice.toFixed(2)}`;
                            } else {
                                totalPriceInput.value = "";
                            }
                        }
                    })
                    .catch((error) => console.error("Error fetching brands:", error));
            }
        });
    });
});





$(document).ready(function () {
    $(".select2").select2({
        placeholder: "Select Location",
        allowClear: true,
        minimumResultsForSearch: 7,
        width: "100%",
    });

    function generateQuotationNumber() { 
        const randomNumber = `Q-${Math.floor(10000000 + Math.random() * 90000000)}`
        return randomNumber;
    }

    function getCurrentDate() {
        const date = new Date();
        const options = { year: "numeric", month: "2-digit", day: "2-digit" };
        return date.toLocaleDateString(undefined, options);
    }

    $("#quotation_number").val(generateQuotationNumber());
    $("#date").val(getCurrentDate());

    $("#service-details").on("input change", ".width, .height, .quantity, .design-price", function () {
        const serviceId = $(this).closest(".service-section").data("service-id");
        
        const width = parseFloat($(`#width-${serviceId}`).val()) || 0;
        const height = parseFloat($(`#height-${serviceId}`).val()) || 0;
        const quantity = parseInt($(`#quantity-${serviceId}`).val(), 10) || 1;
        const designPrice = parseFloat($(`#design-price-${serviceId}`).val()) || 0;

        const area = width * height;
        const totalPrice = area * designPrice * quantity;

        $(`#total-price-${serviceId}`).val(totalPrice.toFixed(2));
    });
});
