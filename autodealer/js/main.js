knopka1.onclick = function(){
   
    let volume = Number(document.getElementById("volume").value),
        price = Number(document.getElementById("price").value);

    let benz = document.getElementById("benz_select").options.selectedIndex,
        age = document.getElementById("age_select").options.selectedIndex,
        volume_price, price_car, koef, akc, all;
    if(benz!=2)
        koef = benz/1000;
    
        if(volume < 3000 && benz == 0) { volume_price = 50; }
        if(volume > 3000 && benz == 0) { volume_price = 100; }
        if(volume < 3500 && benz == 1) { volume_price = 75; }
        if(volume > 3500 && benz == 1) { volume_price = 150; }
        if(volume < 3000 && benz == 3) { volume_price = 35; }
        if(volume > 3000 && benz == 3) { volume_price = 75; }

        if(benz==2) { akc = age * (benz/1000)/2; }

    if(benz == 0 || benz == 1 || benz == 3){
        switch(age){
            case '0': { akc = koef * volume_price * age; }  
            case '1': { akc = koef * volume_price * age; }  
            case '2': { akc = koef * volume_price * age; }  
            case '3': { akc = koef * volume_price * age; }  
            case '4': { akc = koef * volume_price * age; }  
            case '5': { akc = koef * volume_price * age; }  
            case '6': { akc = koef * volume_price * age; }  
            case '7': { akc = koef * volume_price * age; }  
            case '8': { akc = koef * volume_price * age; }  
            case '9': { akc = koef * volume_price * age; }  
            case '10': { akc = koef * volume_price * age; }  
            case '11': { akc = koef * volume_price * age; }  
            case '12': { akc = koef * volume_price * age; }  
            case '13': { akc = koef * volume_price * age; }
            case '14': { akc = koef * volume_price * age; }
            case '15': { akc = koef * volume_price * age; }
        }
    };
        price_car = 0.1 * price;

        all = 0.2 * (price_car + akc);
        let answer = all+" EUR";
    document.getElementById('str').innerHTML = answer;
};


