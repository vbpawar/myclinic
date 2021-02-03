$(function() {
    var jvalidate = $("#diethistoryform").validate({
        ignore: [],
        rules: {
            fat: {
                number:true,
                required : true
            },
            metabolicAge : {
                number:true
            },
            viceral : {
                number :true              
            },
            chest:{
                number:true

            },
            waist:{
                number:true
            },

            hip:{
                number:true
            },

            thighR:{
                number:true
            },
            thighL:{
                number:true
            },

            waistRatio:{
                number:true
            },
            noFamilyMembers:{
                number:true
            },
            dm:{
                number:true
            },
            htn:{
                number:true
            },
            vericose:{
                number:true
            },
            irregularMenses:{
                number:true
            },
            thyroid:{
                number:true
            },
       
            joint:{
                number:true
            },
            constipation:{
                number:true
            },
            pedalEndema:{
                number:true
            },
            pcod:{
                number:true
            },
            backAche:{
                number:true
            },
            acidity:{
                number:true
            },
            gases:{
                number:true
            },
            heartDisease :{
                number:true
            },
            Dislipidemia:{
                number:true
            },
            breathlessness :{
                number:true
            },
            bloating:{
                number:true
            },
            likes:{
                number:true
            },
            dislike:{
                number:true
            },

            scraving:{
                number:true
            },
            outsideeat:{
                number:true
            },
            oconsumption:{
                number:true
            },
            teacoffee:{
                number:true
            }
            

        },
        messages: {
            fat: {
                number : "Enter Only Number",
                required : "required"
            },
            metabolicAge : {
                number: "Enter Only Number"
            },
            viceral : {
                number : "Enter Only Number"              
            },
            chest:{
                number: "Enter Only Number"

            },
            waist:{
                number:"Enter Valid Number"
            },

            hip:{
                number:"Enter Valid Number"
            },

            thighR:{
                number:"Enter Valid Number"
            },
            thighL:{
                number:"Enter Valid Number"
            },

            waistRatio:{
                number:"Enter Valid Number"
            },
            noFamilyMembers:{
                number:"Enter Valid Number"
            },
            dm:{
                number:"Enter Valid Number"
            },
            htn:{
                number:"Enter Valid Number"
            },
            vericose:{
                number:"Enter Valid Number"
            },
            irregularMenses:{
                number:"Enter Valid Number"
            },
            thyroid:{
                number:"Enter Valid Number"
            },
       
            joint:{
                number:"Enter Valid Number"
            },
            constipation:{
                number:"Enter Valid Number"
            },
            pedalEndema:{
                number:"Enter Valid Number"
            },
            pcod :{
                number:"Enter Valid Number"
            },
            backAche:{
                number:"Enter Valid Number"
            },
            acidity:{
                number:"Enter Valid Number"
            },
            gases:{
                number:"Enter Valid Number"
            },
            heartDisease :{
                number:"Enter Valid Number"
            },
            Dislipidemia:{
                number:"Enter Valid Number"
            },
            breathlessness :{
                number:"Enter Valid Number"
            },
            bloating:{
                number:"Enter Valid Number"
            },
            likes:{
                number:"Enter Valid Number"
            },
            dislike:{
                number:"Enter Valid Number"
            },

            scraving:{
                number:"Enter Valid Number"
            },
            outsideeat:{
                number:"Enter Valid Number"
            },
            oconsumption:{
                number:"Enter Valid Number"
            },
            teacoffee:{
                number:"Enter Valid Number"
            }
            
        }
    });
}

);