const divs = document.querySelectorAll('.myDiv2')
const featuresButtonclass = document.querySelectorAll('.featuresButton2')
const template = document.querySelectorAll('.features-template2')
console.log(featuresButtonclass.length>0)
console.log(locales)
console.log(divs)
if (featuresButtonclass.length > 0) {
    locales.forEach((el, index) => {

        featuresButtonclass[index].addEventListener("click", function () {
            console.log('clicked');
            // var template = document.getElementById("features-template" + locales[index]['abbr']);
            var clonedTemplate = document.importNode(template[index].content, true);
            divs[index].appendChild(clonedTemplate);
            var clonedTemplate2 = document.importNode(template[index+1].content, true);
            divs[index+1].appendChild(clonedTemplate2);
        });



        if (document.getElementById("myDiv" + locales[index]['abbr']) !== null) {
            document.getElementById("myDiv" + locales[index]['abbr']).addEventListener("click", function (e) {
                if (e.target.classList.contains("removeButton" + locales[index]['abbr'])) {
                    // Remove the parent node (the div containing the feature)
                    e.target.closest("div").remove();
                    console.log('clicked');
                }
            });
        }
    })
}



// ============= All products Page  ==================

const featuresButton = document.querySelectorAll('.featuresButton')
const myDivs = document.querySelectorAll('.myDiv')
const featuresTemplate = document.querySelectorAll('.features-template2')

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
