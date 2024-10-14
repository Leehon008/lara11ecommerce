function nextTab(tabId) {
    $('.nav-tabs a[href="#' + tabId + '"]').tab('show');
}

function prevTab(tabId) {
    $('.nav-tabs a[href="#' + tabId + '"]').tab('show');
}


$(document).ready(function() {
    const designOptions = {
        'sliding-gates': ['Gate Design 1', 'Gate Design 2', 'Gate Design 3'],
        'sliding-doors': ['Door Design 1', 'Door Design 2', 'Door Design 3'],
        'veranda-screens': ['Screen Design 1', 'Screen Design 2', 'Screen Design 3'],
        'window-frames': ['Frame Design 1', 'Frame Design 2', 'Frame Design 3'],
        'tank-stands': ['Stand Design 1', 'Stand Design 2', 'Stand Design 3'],
        'carports': ['Carport Design 1', 'Carport Design 2', 'Carport Design 3']
    };

    const deliveryLocations = [
        'Harare', 'Bulawayo', 'Mutare', 'Gweru', 'Kwekwe', 'Masvingo', 'Chinhoyi', 'Victoria Falls'
        // Add more locations as needed
    ];

    // Delivery fees for different locations
    const deliveryFees = {
        "Own Delivery": 0,
        "Other Location": 0,
        "Harare": 0,
        "Chitungwiza": 0,
        "Bulawayo": 390,
        "Bindura": 38,
        "Mount Darwin": 110,
        "Glendale": 9,
        "Shamva": 47,
        "Mazowe": 0,
        "Centenary": 100,
        "Guruve": 90,
        "Marondera": 24,
        "Murehwa": 37,
        "Ruwa": 0,
        "Goromonzi": 0,
        "Mutoko": 93,
        "Chivhu": 96,
        "Wedza": 77,
        "Macheke": 58,
        "Chinhoyi": 71,
        "Karoi": 151,
        "Kariba": 315,
        "Norton": 0,
        "Chegutu": 59,
        "Kadoma": 92,
        "Banket": 47,
        "Magunje": 140,
        "Murombedzi": 33,
        "Mutare": 215,
        "Rusape": 120,
        "Nyanga": 218,
        "Chipinge": 400,
        "Chimanimani": 315,
        "Murambinda": 131,
        "Birchenough Bridge": 263,
        "Headlands": 94,
        "Odzi": 179,
        "Gweru": 225,
        "Kwekwe": 163,
        "Zvishavane": 256,
        "Shurugwi": 245,
        "Gokwe": 265,
        "Mvuma": 142,
        "Lalapanzi": 180,
        "Redcliff": 165,
        "Masvingo": 242,
        "Chiredzi": 360,
        "Triangle": 295,
        "Mwenezi": 320,
        "Bikita": 200,
        "Mashava": 240,
        "Zaka": 265,
        "Hwange": 664,
        "Victoria Falls": 822,
        "Lupane": 487,
        "Binga": 550,
        "Dete": 660,
        "Nkayi": 348,
        "Tsholotsho": 535,
        "Gwanda": 466,
        "Beitbridge": 532,
        "Plumtree": 522,
        "Esigodini": 401,
        "Filabusi": 340
    };


    function generateServiceForm(service) {
        let serviceKey = service.toLowerCase().replace(' ', '-');
        let designOptionsHtml = designOptions[serviceKey].map(option => `<option value="${option}">${option}</option>`).join('');

        return `
            <div class="service-form" id="${serviceKey}-form">
                <h4 class="mb-5 text-uppercase">${service}</h4>
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <div class="form-label-fixed mb-4 mt-3">
                            <label for="${serviceKey}-width" class="form-label">Width *</label>
                            <input id="${serviceKey}-width" class="form-control form-control-md form-control_gray" type="number" min="1" required />
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="form-label-fixed mb-4 mt-3">
                            <label for="${serviceKey}-height" class="form-label">Height *</label>
                            <input id="${serviceKey}-height" class="form-control form-control-md form-control_gray" type="number" min="1" required />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group mb-4">
                           
                            <select id="${serviceKey}-design" class="form-control form-control-md form-control_gray" required>
                                <option value="">Select Design</option>
                                ${designOptionsHtml}
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="form-label-fixed mb-4">
                            <label for="${serviceKey}-quantity" class="form-label">Quantity *</label>
                            <input id="${serviceKey}-quantity" class="form-control form-control-md form-control_gray" type="number" min="1" required />
                        </div>
                    </div>
                </div>
                
            </div>`;
    }

    $('input[type="checkbox"][name="services[]"]').change(function() {
        var service = $(this).val().toLowerCase().replace(' ', '-');
        if ($(this).is(':checked')) {
            $('#service-details').append(generateServiceForm(service));
            $('.select2').select2({
                placeholder: "Select Location",
                allowClear: true,
                minimumResultsForSearch: 7
            });
        } else {
            $('#' + service + '-form').remove();
        }
    });
    $('.select2').select2({
        placeholder: "Select Location",
        allowClear: true,
        minimumResultsForSearch: 7, // This hides the search bar initially
        width: '100%', // Adjust the width as needed
    });

    function generateQuotationNumber() {
        const randomNumber = Math.floor(10000000 + Math.random() * 90000000); // Generates an 8-digit number
        return randomNumber;
    }
    
    function getCurrentDate() {
        const date = new Date();
        const options = { year: 'numeric', month: '2-digit', day: '2-digit' };
        return date.toLocaleDateString(undefined, options); // Returns the date in MM/DD/YYYY format
    }
    


});
