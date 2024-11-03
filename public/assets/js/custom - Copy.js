function nextTab(tabId) {
    $('.nav-tabs a[href="#' + tabId + '"]').tab("show");
}

function prevTab(tabId) {
    $('.nav-tabs a[href="#' + tabId + '"]').tab("show");
}

// Delivery fees for different locations
document.addEventListener("DOMContentLoaded", function () {
    const locations = [
        { name: "Own Delivery", fee: 0 },
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

    const locationSelect = document.getElementById("delivery-location");

    // Populate location options
    locations.forEach((location) => {
        const option = document.createElement("option");
        option.value = location.name;
        option.text = `${location.name} - $${location.fee}`;
        locationSelect.add(option);
    });

    // Additional JavaScript for handling delivery fee in the quotation can be added here
});

document.addEventListener("DOMContentLoaded", () => {
    const services = document.querySelectorAll(".service-checkbox");

    services.forEach((service) => {
        service.addEventListener("change", function () {
            const serviceId = this.value; // Category ID to retrieve the associated brands
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
                            <input type="number" step="0.01" id="input-width-${serviceId}" class="form-control" placeholder="Enter width" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="input-height-${serviceId}" class="form-label">Height (m)</label>
                            <input type="number" step="0.01" id="input-height-${serviceId}" class="form-control" placeholder="Enter height" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="input-quantity-${serviceId}" class="form-label">Quantity</label>
                            <input type="number" step="0.01" id="input-quantity-${serviceId}" class="form-control" placeholder="Enter quantity" required>
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="select-brand-${serviceId}" class="form-label">Design</label>
                            <select id="select-brand-${serviceId}" class="form-control" required>
                                <option value="" disabled selected>Select a design</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="total-price-${serviceId}" class="form-label">Total Price</label>
                            <input type="text" id="total-price-${serviceId}" class="form-control" readonly>
                        </div>
                    </div>
                `;

                document.getElementById("service-details").appendChild(serviceSection);

                fetch(`/quotation/get-brands/${serviceId}`)
                    .then((response) => response.json())
                    .then((brands) => {
                        const brandSelect = document.getElementById(
                            `select-brand-${serviceId}`
                        );
                        brands.forEach((brand) => {
                            const option = document.createElement("option");
                            option.value = brand.price_per_m2;
                            option.textContent = `${brand.name} - $${brand.price_per_m2} per m²`;
                            brandSelect.appendChild(option);
                        });

                        // Add event listeners to calculate total price whenever inputs change
                        const widthInput = document.getElementById(
                            `input-width-${serviceId}`
                        );
                        const heightInput = document.getElementById(
                            `input-height-${serviceId}`
                        );
                        const quantityInput = document.getElementById(
                            `input-quantity-${serviceId}`
                        );
                        const totalPriceInput = document.getElementById(
                            `total-price-${serviceId}`
                        );

                        brandSelect.addEventListener("change", calculateTotal);
                        widthInput.addEventListener("input", calculateTotal);
                        heightInput.addEventListener("input", calculateTotal);
                        quantityInput.addEventListener("input", calculateTotal);

                        function calculateTotal() {
                            const pricePerM2 = parseFloat(brandSelect.value);
                            const width = parseFloat(widthInput.value);
                            const height = parseFloat(heightInput.value);
                            const quantity = parseInt(quantityInput.value) || 1;

                            if (
                                !isNaN(pricePerM2) &&
                                !isNaN(width) &&
                                !isNaN(height) &&
                                !isNaN(quantity)
                            ) {
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

document.addEventListener("DOMContentLoaded", function () {
    const designData = {}; // Store design data with prices

    // Function to fetch designs and populate the dropdown
    async function fetchDesigns(serviceId) {
        try {
            const response = await fetch("/api/get-designs"); // Adjust this API endpoint as needed
            const designs = await response.json();

            const designSelect = document.getElementById(`select-brand-${serviceId}`);
            designSelect.innerHTML = '<option value="" disabled selected>Select a design</option>';

            designs.forEach(design => {
                designData[design.id] = design.price_per_m2;
                designSelect.innerHTML += `<option value="${design.id}" data-price="${design.price_per_m2}">${design.name}</option>`;
            });
        } catch (error) {
            console.error("Error fetching designs:", error);
        }
    }

    // Event listener to handle checkbox clicks
    document.querySelectorAll(".service-checkbox").forEach(checkbox => {
        checkbox.addEventListener("change", function () {
            const serviceId = this.dataset.serviceId;

            if (this.checked) {
                showServiceFields(serviceId);
                fetchDesigns(serviceId); // Fetch designs when checkbox is checked
            } else {
                hideServiceFields(serviceId);
            }
        });
    });

    // Function to show fields for a selected service
    function showServiceFields(serviceId) {
        const serviceFields = document.getElementById(`service-fields-${serviceId}`);
        serviceFields.classList.remove("d-none");

        // Add event listeners for calculating total price
        document.getElementById(`select-brand-${serviceId}`).addEventListener("change", function () {
            calculateTotalPrice(serviceId);
        });
        document.getElementById(`width-${serviceId}`).addEventListener("input", function () {
            calculateTotalPrice(serviceId);
        });
        document.getElementById(`height-${serviceId}`).addEventListener("input", function () {
            calculateTotalPrice(serviceId);
        });
        document.getElementById(`quantity-${serviceId}`).addEventListener("input", function () {
            calculateTotalPrice(serviceId);
        });
    }

    // Function to hide fields for an unselected service
    function hideServiceFields(serviceId) {
        const serviceFields = document.getElementById(`service-fields-${serviceId}`);
        serviceFields.classList.add("d-none");

        // Reset values to avoid any lingering calculations
        document.getElementById(`select-brand-${serviceId}`).value = "";
        document.getElementById(`width-${serviceId}`).value = "";
        document.getElementById(`height-${serviceId}`).value = "";
        document.getElementById(`quantity-${serviceId}`).value = "";
        document.getElementById(`total-price-${serviceId}`).value = "";
    }

    // Function to calculate total price for each service
    function calculateTotalPrice(serviceId) {
        const designSelect = document.getElementById(`select-brand-${serviceId}`);
        const selectedDesignId = designSelect.value;
        const pricePerM2 = designData[selectedDesignId] || 0;

        const width = parseFloat(document.getElementById(`width-${serviceId}`).value) || 0;
        const height = parseFloat(document.getElementById(`height-${serviceId}`).value) || 0;
        const quantity = parseInt(document.getElementById(`quantity-${serviceId}`).value) || 1;

        const area = width * height;
        const totalPrice = area * pricePerM2 * quantity;

        document.getElementById(`total-price-${serviceId}`).value = totalPrice.toFixed(2);
    }
});

$(document).ready(function () {
    $(".select2").select2({
        placeholder: "Select Location",
        allowClear: true,
        minimumResultsForSearch: 7, // This hides the search bar initially
        width: "100%", // Adjust the width as needed
    });

    function generateQuotationNumber() {
        const randomNumber = Math.floor(10000000 + Math.random() * 90000000); // Generates an 8-digit number
        return randomNumber;
    }

    function getCurrentDate() {
        const date = new Date();
        const options = { year: "numeric", month: "2-digit", day: "2-digit" };
        return date.toLocaleDateString(undefined, options); // Returns the date in MM/DD/YYYY format
    }

    // Main function to calculate and generate the quotation preview
    function calculateQuotation() {
        console.log("calculateQuotation function is loaded");
        generateQuotationPreview();
    }

    // Generate the quotation preview content
    function generateQuotationPreview() {
        const userFullName = document.getElementById("user-fullname").value || "N/A";
        const userEmail = document.getElementById("user-email").value || "N/A";
        const userPhone = document.getElementById("user-phone").value || "N/A";
        const userAddress = document.getElementById("delivery-location").value || "N/A";

        const serviceSections = document.querySelectorAll(".service-section");
        let totalCost = 0;
        let previewTableRows = "";

        serviceSections.forEach((section) => {
            const serviceName = section.querySelector(".service-checkbox").dataset.serviceName;
            const width = parseFloat(section.querySelector(`#input-width-${serviceName}`).value) || 0;
            const height = parseFloat(section.querySelector(`#input-height-${serviceName}`).value) || 0;
            const quantity = parseInt(section.querySelector(`#input-quantity-${serviceName}`).value) || 1;
            const pricePerM2 = parseFloat(section.querySelector(`#brand-price-${serviceName}`).value) || 0;

            const area = width * height;
            const itemTotal = area * pricePerM2 * quantity;
            totalCost += itemTotal;

            previewTableRows += `
                <tr>
                    <td>${serviceName}</td>
                    <td>${width} m</td>
                    <td>${height} m</td>
                    <td>${quantity}</td>
                    <td>$${pricePerM2}</td>
                    <td>$${itemTotal.toFixed(2)}</td>
                </tr>
            `;
        });

        const deliveryFee = parseFloat(document.getElementById("delivery-location").value) || 0;
        const vat = totalCost * 0.15;
        const grandTotal = totalCost + deliveryFee + vat;

        document.getElementById("quotation-preview").innerHTML = `
            <div class="text-center mb-4">
                <img src="{{asset('assets/images/logo.png')}}" alt="BFC Logo" class="mb-2">
                <h3>BFC Quotation</h3>
                <p><strong>Client Details</strong><br>
                    ${userFullName}<br>
                    ${userEmail}<br>
                    ${userPhone}<br>
                    ${userAddress}
                </p>
            </div>
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Service</th>
                        <th>Width (m)</th>
                        <th>Height (m)</th>
                        <th>Quantity</th>
                        <th>Price per m²</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    ${previewTableRows}
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="5" class="text-end">Subtotal</th>
                        <td>$${totalCost.toFixed(2)}</td>
                    </tr>
                    <tr>
                        <th colspan="5" class="text-end">Delivery Fee</th>
                        <td>$${deliveryFee.toFixed(2)}</td>
                    </tr>
                    <tr>
                        <th colspan="5" class="text-end">VAT (15%)</th>
                        <td>$${vat.toFixed(2)}</td>
                    </tr>
                    <tr class="table-primary">
                        <th colspan="5" class="text-end">Grand Total</th>
                        <td><strong>$${grandTotal.toFixed(2)}</strong></td>
                    </tr>
                </tfoot>
            </table>
        `;
    }

    // Ensure calculateQuotation is triggered appropriately
    $('#quotationForm').on('submit', function (e) {
        e.preventDefault();
        calculateQuotation();
    });

    $('.service-checkbox, .input-width, .input-height, .input-quantity, #delivery-location').on('change', function () {
        calculateQuotation();
    });
});


