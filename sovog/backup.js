var color_string = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f"],
    speeds = ["x-slow", "slow", "normal", "fast", "x-fast"],
    container = $("#sovogs");
var createColor = function (range) {
    var color = "#";
    for (var i = 0; i < 6; i++) {
        if (range) {
            switch (range) {
                case "light":
                    color += color_string[(Math.floor(Math.random() * 6)) + 10];
                    break;
                case "light":
                    color += color_string[(Math.floor(Math.random() * 6)) + 5];
                    break;
                case "dark":
                    color += color_string[Math.floor(Math.random() * 6)];
                    break;
                default:
                    color += color_string[Math.floor(Math.random() * 16)];
                    break;
            }
        }
        else {
            color += color_string[Math.floor(Math.random() * 16)];
        }
    }
    return color;
};

var randomColor = function () {
    var colors = ["FFD230", "FFBF52", "EDCC82", "DCD8B2", "DCCDBC", "88B2AE", "5F8B9C", "4C6185", "404165", "D1B305", "A49286", "E0D1B4", "BDD9D6", "BDA0A0", "B8D0DE", "9FC2D6", "86B4CF", "73A2BD", "6792AB"];
    return "#" + colors[Math.floor(Math.random() * colors.length)];
}

var attrs = ["meaty", "spikes", "skinny", "short", "tall", "shifty-eyes", "jumping"],
    rare_attrs = ["flex", "sitting", "shifty", "bouncy", "blink", "sad", "dopey", "happy", "angry", "shifting", "closed-mouth", "little", "big"],
    super_rare_attrs = ["giant", "tiny", "wide-open-mouth"];

var sovogcount = 0;
// global var

//--object sovog--
var makeSovog = function (data) {
    sovogcount++;
    if (typeof data == 'undefined') {
        data = {
            name: false,
            body: false,
            arm: false,
            eye: false,
            attr: false,
            speed: false
        }
    }
    if (data.attr) {
        this.which_attrs = data.attr;
        alert(this.which_attrs.length);
    } else {
        this.which_attrs = [];
        for (var i = 0, len = attrs.length; i < len; i++) {
            if (Math.floor(Math.random() * 2)) {
                this.which_attrs.push(attrs[i]);
            }
        }
        for (var i = 0, len = rare_attrs.length; i < len; i++) {
            if (Math.floor(Math.random() * 1.5)) {
                this.which_attrs.push(rare_attrs[i]);
            }
        }
        for (var i = 0, len = rare_attrs.length; i < len; i++) {
            if (Math.floor(Math.random() * 1.1)) {
                this.which_attrs.push(super_rare_attrs[i]);
            }
        }
    }
    var looking_options = [(Math.random() * 1.6) + "em", (-(Math.random() * 6) + "em")];
    this.looking = looking_options[Math.floor(Math.random() * 2)];
    this.speed = speeds[data.speed?data.speed:Math.floor(Math.random() * speeds.length)];
    this.light_color = data.arm?data.arm:randomColor();
    this.dark_color = data.body?data.body:randomColor();
    this.eye_color = data.eye?data.eye:randomColor();
    this.sovogname = data.name?data.name:"sovog"+sovogcount;
    this.border_color = "#eaeaea";

    this.getElement = function(){
        var elem = '<div class="sovog';
        if (this.which_attrs) {
            for (var i = 0, len = this.which_attrs.length; i < len; i++) {
                elem += (' ' + this.which_attrs[i]);
            }
        }
        elem += " " + this.speed
        elem += '">' +
            '<div class="head">' +
            '<div class="top">' +
            '<div class="base" style="background: ' + this.light_color + ';"></div>' +
            '<div class="antennae left">' +
            '<div class="ball" style="background: ' + this.dark_color + ';"></div>' +
            '</div>' +
            '<div class="antennae right">' +
            '<div class="ball" style="background: ' + this.dark_color + ';"></div>' +
            '</div>' +
            '</div>' +
            '<div class="face" style="background: ' + this.dark_color + ';">' +
            '<div class="left-side" style="background: ' + this.dark_color + ';"></div>' +
            '<div class="right-side" style="background: ' + this.dark_color + ';"></div>' +
            '</div>' +
            '<div class="eye left">' +
            '<div class="eyelid" style="background: ' + this.light_color + ';"></div>' +
            '<div class="eyelid-two" style="background: ' + this.light_color + ';"></div>' +
            '<div class="eyeball" style="margin-left: ' + this.looking + '; background: ' + this.eye_color + ';"></div>' +
            '</div>' +
            '<div class="eye right">' +
            '<div class="eyelid" style="background: ' + this.light_color + ';"></div>' +
            '<div class="eyelid-two" style="background: ' + this.light_color + ';"></div>' +
            '<div class="eyeball" style="margin-left: ' + this.looking + '; background: ' + this.eye_color + ';"></div>' +
            '</div>' +
            '<div class="mouth"></div>' +
            '</div>' +
            '<div class="neck" style="background: ' + this.light_color + ';"></div>' +
            '<div class="body">' +
            '<div class="torso" style="background: ' + this.dark_color + ';">' +
            '<div class="left-side" style="background: ' + this.dark_color + ';"></div>' +
            '<div class="right-side" style="background: ' + this.dark_color + ';"></div>' +
            '</div>' +
            '<div class="shoulder left"></div>' +
            '<div class="shoulder right"></div>' +
            '<div class="arm left" style="border-left-color: ' + this.light_color + ';">' +
            '<div class="elbow"></div>' +
            '<div class="hand" style="background: ' + this.dark_color + ';"></div>' +
            '</div>' +
            '<div class="arm right" style="border-right-color: ' + this.light_color + ';">' +
            '<div class="elbow"></div>' +
            '<div class="hand" style="background: ' + this.dark_color + ';"></div>' +
            '</div>' +
            '<div class="leg left" style="background: ' + this.light_color + ';">' +
            '<div class="knee"></div>' +
            '<div class="foot" style="background: ' + this.dark_color + ';"></div>' +
            '</div>' +
            '<div class="leg right" style="background: ' + this.light_color + ';">' +
            '<div class="knee"></div>' +
            '<div class="foot" style="background: ' + this.dark_color + ';"></div>' +
            '</div>' +
            '</div>' +
            '</div>';
        return elem;
    };

    var element = '<div class="wrapper" id="'+ this.sovogname+'">' +
        '</div>';
    container.append(element);

    this.sovog = $('#'+this.sovogname);

    this.updateSovog = function(){
        this.sovog.html(this.getElement);
    };

    this.updateSovog();

    this.changeSpeed = function(spd){
        this.speed = speeds[spd];
        this.updateSovog();
    };

    this.changeAttrs = function(atr){
        this.which_attrs = atr;
        this.updateSovog();
    }
}
//--object sovog--

var Scene = function(ne){
    var nextscene = ne?ne:new Scene(),
        act = function(){
        };

    var play = function(){
        act();
        nextscene.play();
    };

    var setAct = function(ac){
        act = ac;
    };
};

var speak = function(text){
    $('#make-sovog').text(text);
};

var boro = new makeSovog({
    name: 'boro',
    body: '#595959',
    arm: '#787878' ,
    eye: '#000000',
    attr: ["sad", "giant", "jumping"],
    speed: 0
});

$(document).ready(function(){
    $("#make-sovog").click(function () {
        makeSovog({});
    });
    boro.sovog.click(function(){
        boro.changeSpeed(4);
    });
});
//makeSovog('');
//makeSovog('');
