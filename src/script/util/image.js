var Img = {
    cached: cached
};

function cached(url){
    var test = document.createElement("img");
    test.src = url;
    return test.complete || test.width+test.height > 0;
}

module.exports = Img;