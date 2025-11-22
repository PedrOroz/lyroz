if($("#telephone_user").length || $("#cell_phone_user").length) {
    
    window.intlTelInput = require('intl-tel-input');

    if($("#telephone_user").length) {
        const telephone     = document.querySelector("#telephone_user");

        intlTelInput(telephone, {
            initialCountry: "auto",
            geoIpLookup: callback => {
                fetch("https://ipapi.co/json")
                .then(res   => res.json())
                .then(data  => callback(data.country_code))
                .catch(()   => callback("mx"));
            },
            placeholderNumberType: 'FIXED_LINE',
            separateDialCode:true,
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js"
        });
    }
    
    if($("#cell_phone_user").length) {
        const cell_phone    = document.querySelector("#cell_phone_user");

        intlTelInput(cell_phone, {
            initialCountry: "auto",
            geoIpLookup: callback => {
                fetch("https://ipapi.co/json")
                .then(res   => res.json())
                .then(data  => callback(data.country_code))
                .catch(()   => callback("mx"));
            },
            placeholderNumberType: 'MOBILE',
            separateDialCode:true,
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
        });
    }
}else{
        console.log("No existen los ID's");
     }