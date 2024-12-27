$(function(){

    // slugify name
    $("input[name=name]").keyup(function(){

        var slugInput = $(this).closest("form").find("input[name=slug]");
        var slugifiedText = slugify($(this).val());
        slugInput.val(slugifiedText);

    });

    $("input[name=slug]").blur(function(){

        var slugifiedText = slugify($(this).val());
        $(this).val(slugifiedText);

    });

    function slugify(text){

        text = replaceGeoToEng(text);

        return text.toString().toLowerCase()
            .replace(/\s+/g, "-")           // Replace spaces with -
            .replace(/[^\w\-]+/g, "")       // Remove all non-word chars
            // .replace(/[`~!@#$%^&*()_|+\=?;:"",.<>\{\}\[\]\\\/₾]/gi, "")
            .replace(/\-\-+/g, "-")         // Replace multiple - with single -
            .replace(/^-+/, "")             // Trim - from start of text
            .replace(/-+$/, "");            // Trim - from end of text

    }

    //__ replace geo to eng

    function replaceGeoToEng(text){
        
        var geoToEng = [
            {a : "ა"},
            {b : "ბ"},
            {g : "გ"},
            {d : "დ"},
            {e : "ე"},
            {v : "ვ"},
            {z : "ზ"},
            {t : "თ"},
            {i : "ი"},
            {k : "კ"},
            {l : "ლ"},
            {m : "მ"},
            {n : "ნ"},
            {o : "ო"},
            {p : "პ"},
            {zh : "ჟ"},
            {r : "რ"},
            {s : "ს"},
            {T : "ტ"},
            {u : "უ"},
            {f : "ფ"},
            {q : "ქ"},
            {gh : "ღ"},
            {y : "ყ"},
            {sh : "შ"},
            {ch : "ჩ"},
            {ts : "ც"},
            {dz : "ძ"},
            {ts : "წ"},
            {ch : "ჭ"},
            {kh : "ხ"},
            {j : "ჯ"},
            {h : "ჰ"}
        ];

        text = text.split("");

        $.each(text, function(tKey, tValue){
            for(var j = 0; j < geoToEng.length; j++){
                $.each(geoToEng[j], function(gKey, gValue){
                    if(tValue == gValue){
                        text[tKey] = gKey;
                    }
                });
            }
        });

        return text.toString();    

    }

});