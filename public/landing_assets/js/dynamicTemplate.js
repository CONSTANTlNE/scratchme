const divs = document.querySelectorAll('.myDiv')

const featuresButtonclass = document.querySelectorAll('.featuresButton')
const template = document.querySelectorAll('.features-template')


locales.forEach((el, index) => {
    const featuresButton1 = document.getElementById('featuresButton' + locales[index]['abbr']);

    // if (featuresButton1) {
    featuresButtonclass[index].addEventListener("click", function () {

            // var template = document.getElementById("features-template" + locales[index]['abbr']);

            var clonedTemplate = document.importNode(template[index+1].content, true);

                divs[index+1].appendChild(clonedTemplate);

        });


// Delegate the event outside of the click event handler
        document.getElementById("myDiv" + locales[index]['abbr']).addEventListener("click", function (e) {
            if (e.target.classList.contains("removeButton" + locales[index]['abbr'])) {
                // Remove the parent node (the div containing the feature)
                e.target.closest("div").remove();
                console.log('clicked');
            }


        });
    // }


})


//  All products Page

const featuresButton = document.querySelectorAll('.featuresButton')
const myDivs = document.querySelectorAll('.myDiv')
const featuresTemplate = document.querySelectorAll('.features-template')


console.log(featuresButton)
featuresButton.forEach((el, index) => {
    el.addEventListener('click', function () {

        var clonedTemplate = document.importNode(featuresTemplate[index].content, true);
        myDivs[index].appendChild(clonedTemplate);

    });
});


myDivs.forEach((el, index) => {

    el.addEventListener('click', function (e) {
        if (e.target.classList.contains("removeButton")) {
            // Remove the parent node (the div containing the feature)
            e.target.closest("div").remove();
        }
    });
})


// delete old features

const deleteFeatureButton = document.querySelectorAll('.deleteFeatureButton')
const deleteFeatures = document.querySelectorAll('.deleteFeature')


deleteFeatures.forEach((el, index) => {

    el.addEventListener('click', function (e) {
        if (e.target.classList.contains("deleteFeatureButton")) {
            // Remove the parent node (the div containing the feature)
            e.target.closest("div").remove();
        }
    });
})
