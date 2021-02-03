$(function() {
    var msg={
                  number: "enter valid number" 
            };
    var jvalidate = $("#presentillnessform").validate({
        ignore: [],
        rules: {
            chiefcomplaints: {
                alphanumeric: true
           
            },
            history: {
                alphanumeric: true
              
            },

            bp: {
                //required: true,
                alphanumeric: true
            },
            chest:{
                alphanumeric: true

            },
            addedSound:{
                alphanumeric: true
            },

            wheezeRhonchi:{
                alphanumeric: true
            },

            dyspoea:{
                alphanumeric: true
            },
            conciousness:{
                alphanumeric: true
            },
            umnreflex:{
                alphanumeric: true
            },
            lmnreflex:{
                alphanumeric: true
            },
            reflexes:{
                alphanumeric: true
            },
            s1s2heard:{
                alphanumeric: true
            },
            murmur:{
                alphanumeric: true
            },
            oralMucosa:{
                alphanumeric: true
            },
            scalp:{
                alphanumeric: true
            },
       
            nodules:{
                alphanumeric: true
            },
            eyes:{
                alphanumeric: true
            },
            raynaud:{
                alphanumeric: true
            },
            telangiectasia:{
                alphanumeric: true
            },
            Waist:{
                number:true
            },
            pulse:{
                number:true
            },
            hip:{
                number:true
            },
            spo2:{
                number:true
            },
            hb1c:{
                number:true
            },
            temp:{
                number:true
            },
            fbs:{
                number:true
            },
            weight:{
                number:true
            },
            height:{
                number:true
            },

            photosensivity:{
                alphanumeric: true
            },
            rash:{
                alphanumeric: true
            },
            site:{
                alphanumeric: true
            },
            type:{
                alphanumeric: true
            },
            itching:{
                alphanumeric: true
            }

        },
        messages: {
            
            chiefcomplaints: {
                alphanumeric:"enter alphanumeric characters",
                required: "Please enter  Chief complaints",
                maxlength: "Length Exceed upto 100 characters"
            },
            history: {
                alphanumeric:"enter alphanumeric characters",
                required: "Please enter history",
                maxlength: "Length Exceed upto 100 characters"
            },
            bp:  {
                alphanumeric:"enter alphanumeric characters"
            },
            chest :{
                alphanumeric:"enter alphanumeric characters"
            },
            addedSound :{
                alphanumeric:"enter alphanumeric characters"
            },
            wheezeRhonchi :{
                alphanumeric:"enter alphanumeric characters"
            },
            dyspoea :{
                alphanumeric:"enter alphanumeric characters"
            },
            conciousness :{
                alphanumeric:"enter alphanumeric characters"
            },
            umnreflex :{
                alphanumeric:"enter alphanumeric characters"
            },
            lmnreflex :{
                alphanumeric:"enter alphanumeric characters"
            },
            reflexes :{
                alphanumeric:"enter alphanumeric characters"
            },
            s1s2heard :{
                alphanumeric:"enter alphanumeric characters"
            },
            murmur :{
                alphanumeric:"enter alphanumeric characters"
            },
            oralMucosa :{
                alphanumeric:"enter alphanumeric characters"
            },

            scalp :{
                alphanumeric:"enter alphanumeric characters"
            },
            nodules :{
                alphanumeric:"enter alphanumeric characters"
            },
            eyes :{
                alphanumeric:"enter alphanumeric characters"
            },
            raynaud :{
                alphanumeric:"enter alphanumeric characters"
            },
            telangiectasia :{
                alphanumeric:"enter alphanumeric characters"
            },
            Waist :{
                number: "enter valid number"
            },
            pulse :{
                number: "enter valid number"
            },
            hip :{
                number: "enter valid number"
            },
            weight :{
                number: "enter valid number"
            },
            height :{
                number: "enter valid number"
            },
            photosensivity:{
                alphanumeric:"enter alphanumeric characters"
            },
            rash:{
                alphanumeric:"enter alphanumeric characters"
            },
            site:{
                alphanumeric:"enter alphanumeric characters"
            },
            type:{
                alphanumeric:"enter alphanumeric characters"
            },
            itching:{
                alphanumeric:"enter alphanumeric characters"
            }
        }
    });
}

);