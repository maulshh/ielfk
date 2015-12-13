var sovogcount = 0;
var container = $("#sovogs"),
    looking_options = [(Math.random() * 1.6) + "em", (-(Math.random() * 6) + "em")],
    speeds = ["x-slow", "slow", "normal", "fast", "x-fast"],
    color_string = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f"];
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
// global var

//--object sovog--
var makeSovog = function (data) {
    if(!data){
        data = {};
    }
    sovogcount++;
    var which_attrs;
    if (data.attr) {
        which_attrs = data.attr;
    } else {
        which_attrs = [];
        for (var i = 0, len = attrs.length; i < len; i++) {
            if (Math.floor(Math.random() * 2)) {
                which_attrs.push(attrs[i]);
            }
        }
        for (var i = 0, len = rare_attrs.length; i < len; i++) {
            if (Math.floor(Math.random() * 1.5)) {
                which_attrs.push(rare_attrs[i]);
            }
        }
        for (var i = 0, len = rare_attrs.length; i < len; i++) {
            if (Math.floor(Math.random() * 1.1)) {
                which_attrs.push(super_rare_attrs[i]);
            }
        }
    }
    var looking = data.looking?data.looking:looking_options[Math.floor(Math.random() * 2)],
        speed = speeds[data.speed?data.speed-1:Math.floor(Math.random() * speeds.length)],
        light_color = data.arm?data.arm:randomColor(),
        dark_color = data.body?data.body:randomColor(),
        eye_color = data.eye?data.eye:randomColor(),
        sovogname = data.name?data.name:"sovog"+sovogcount;

    this.getElement = function(){
        var elem = '<div class="sovog';
        if (which_attrs) {
            for (var i = 0, len = which_attrs.length; i < len; i++) {
                elem += (' ' + which_attrs[i]);
            }
        }
        elem += " " + speed
        elem += '">' +
            '<div class="head">' +
                '<div class="top">' +
                    '<div class="base" style="background: ' + light_color + ';"></div>' +
                    '<div class="antennae left">' +
                        '<div class="ball" style="background: ' + dark_color + ';"></div>' +
                    '</div>' +
                    '<div class="antennae right">' +
                        '<div class="ball" style="background: ' + dark_color + ';"></div>' +
                    '</div>' +
                '</div>' +
                '<div class="face" style="background: ' + dark_color + ';">' +
                    '<div class="left-side" style="background: ' + dark_color + ';"></div>' +
                    '<div class="right-side" style="background: ' + dark_color + ';"></div>' +
                '</div>' +
                '<div class="eye left">' +
                    '<div class="eyelid" style="background: ' + light_color + ';"></div>' +
                    '<div class="eyelid-two" style="background: ' + light_color + ';"></div>' +
                    '<div class="eyeball" style="margin-left: ' + looking + '; background: ' + eye_color + ';"></div>' +
                '</div>' +
                '<div class="eye right">' +
                    '<div class="eyelid" style="background: ' + light_color + ';"></div>' +
                    '<div class="eyelid-two" style="background: ' + light_color + ';"></div>' +
                    '<div class="eyeball" style="margin-left: ' + looking + '; background: ' + eye_color + ';"></div>' +
                '</div>' +
                '<div class="mouth"></div>' +
            '</div>' +
            '<div class="neck" style="background: ' + '#FFFFFF' + ';"></div>' +
            '<div class="body">' +
                '<div class="torso" style="background: ' + dark_color + ';">' +
                    '<div class="left-side" style="background: ' + dark_color + ';"></div>' +
                    '<div class="right-side" style="background: ' + dark_color + ';"></div>' +
                '</div>' +
                '<div class="shoulder left"></div>' +
                '<div class="shoulder right"></div>' +
                '<div class="arm left" style="border-left-color: ' + light_color + ';">' +
                    '<div class="elbow"></div>' +
                    '<div class="hand" style="background: ' + dark_color + ';"></div>' +
                '</div>' +
                '<div class="arm right" style="border-right-color: ' + light_color + ';">' +
                    '<div class="elbow"></div>' +
                    '<div class="hand" style="background: ' + dark_color + ';"></div>' +
                '</div>' +
                '<div class="leg left" style="background: ' + light_color + ';">' +
                    '<div class="knee"></div>' +
                    '<div class="foot" style="background: ' + dark_color + ';"></div>' +
                '</div>' +
                '<div class="leg right" style="background: ' + light_color + ';">' +
                    '<div class="knee"></div>' +
                    '<div class="foot" style="background: ' + dark_color + ';"></div>' +
                '</div>' +
            '</div>' +
        '</div>';
        return elem;
    };


    this.getElementdestroyed = function(){
        var elem = '<div class="sovog';
        if (which_attrs) {
            for (var i = 0, len = which_attrs.length; i < len; i++) {
                elem += (' ' + which_attrs[i]);
            }
        }
        elem += " " + speed
        elem += '">' +
            '<div class="body">' +
            '<div class="torso" style="background: ' + dark_color + ';">' +

            '<div class="neck" style="background: ' + '#FFFFFF' + ';"></div>' +
            '<div class="leg left" style="background: ' + light_color + ';">' +
            '<div class="knee"></div>' +
            '<div class="shoulder left"></div>' +
            '<div class="shoulder right"></div>' +
            '<div class="foot" style="background: ' + dark_color + ';"></div>' +
            '</div>' +
            '<div class="leg right" style="background: ' + light_color + ';">' +
            '<div class="head">' +
            '<div class="top">' +
            '<div class="base" style="background: ' + light_color + ';"></div>' +
            '<div class="antennae left">' +
            '<div class="ball" style="background: ' + dark_color + ';"></div>' +
            '</div>' +
            '<div class="antennae right">' +
            '<div class="ball" style="background: ' + dark_color + ';"></div>' +
            '</div>' +
            '</div>' +
            '<div class="face" style="background: ' + dark_color + ';">' +
            '<div class="left-side" style="background: ' + dark_color + ';"></div>' +
            '<div class="right-side" style="background: ' + dark_color + ';"></div>' +
            '</div>' +
            '<div class="eye left">' +
            '<div class="eyelid" style="background: ' + light_color + ';"></div>' +
            '<div class="eyelid-two" style="background: ' + light_color + ';"></div>' +
            '<div class="eyeball" style="margin-left: ' + looking + '; background: ' + eye_color + ';"></div>' +
            '</div>' +
            '<div class="eye right">' +
            '<div class="eyelid" style="background: ' + light_color + ';"></div>' +
            '<div class="eyelid-two" style="background: ' + light_color + ';"></div>' +
            '<div class="eyeball" style="margin-left: ' + looking + '; background: ' + eye_color + ';"></div>' +
            '</div>' +
            '<div class="mouth"></div>' +
            '</div>' +
            '<div class="knee"></div>' +
            '<div class="foot" style="background: ' + dark_color + ';"></div>' +
            '</div>' +

            '<div class="arm right" style="border-right-color: ' + light_color + ';">' +
            '<div class="elbow"></div>' +
            '<div class="arm left" style="border-left-color: ' + light_color + ';">' +
            '<div class="left-side" style="background: ' + dark_color + ';"></div>' +
            '<div class="right-side" style="background: ' + dark_color + ';"></div>' +
            '</div>' +
            '<div class="elbow"></div>' +
            '<div class="hand" style="background: ' + dark_color + ';"></div>' +
            '</div>' +
            '<div class="hand" style="background: ' + dark_color + ';"></div>' +
            '</div>' +
            '</div>' +
            '</div>';
        return elem;
    };

    var element = '<div class="wrapper" id="'+ sovogname+'">' +
    '</div>';
    if(data.append)
        data.append.append(element);
    else
        container.append(element);

    this.sovog = $('#'+sovogname);

    this.destroySovog = function(){
        this.sovog.html(this.getElementdestroyed);
        this.sovog.append('<div class="button" id="' + sovogname + '-speak">Hi!</div>');
    };

    this.updateSovog = function(){
        this.sovog.html(this.getElement);
        //alert(this.getElement)
        this.sovog.append('<div class="button" id="' + sovogname + '-speak">Hi!</div>');
    };

    if(data.destroy)
        this.destroySovog();
    else
        this.updateSovog();

    this.changeSpeed = function(spd){
        speed = speeds[spd];
        this.updateSovog();
    };

    this.changeAttrs = function(atr){
        which_attrs = atr;
        this.updateSovog();
    }

    this.sovog.click(function(){
        data.click(this);
    })
}
//--object sovog--

var Scene = function(data){
    var nextscene = data.nextscene?data.nextscene:null,
        act = data.act?data.act:null;

    this.play = function(){
        act(nextscene);
        if(data.timeout){
            setTimeout(function(){
                if(nextscene != null){
                    nextscene.play()
                }
            }, data.timeout);
        }
    };

    this.setAct = function(ac){
        act = ac;
    };
};

var opened = 0,
to_open = 0;
function open_mouth(){
    if(opened < to_open){
        var moth = $(".mouth:first");
        if(moth.hasClass('hovered')){
            moth.removeClass('hovered');
        } else {
            moth.addClass('hovered');
        }
        opened++;
    }
    setTimeout('open_mouth()', 200);
}

var speak = function(data){
    $('#boro-speak').html(data.text);
    to_open += data.length*2;
};

var subtitle = function(data){
    $('#subtitle').html(data.text);
    if(data.timeout){
        setTimeout(function(){
            $('#subtitle').html('');
        }, data.timeout);
    }
};

var green = new makeSovog({
    name: 'green',
    body: '#02A833',
    arm: '#787878' ,
    eye: '#000000',
    click: function(){
    }
}), red = new makeSovog({
    name: 'red',
    body: '#DE2226',
    arm: '#787878' ,
    eye: '#000000',
    click: function(){
    }
}), blue =  new makeSovog({
    name: 'blue',
    body: '#4772BB',
    arm: '#787878' ,
    eye: '#000000',
    click: function(){
    }
});
//========================================================================================
var scene, scene2, scene3, scene4, scene5, scene6;

var scene7 = new Scene({
    act: function(){
        speak({
            text:"Can you help me?",
            length: 4
        });
        subtitle({
            text:"Click on the other robot"
        });
        var clicked1 = false
        $('#friend1').click(function(){
            if(!clicked1){
                subtitle({
                    text:"<strong>Yay!!</strong>",
                    timeout:2000
                });
                friend1.updateSovog();
                boro.changeAttrs(['happy', 'big', 'tall', 'skinny', 'jumping']);
                next.play();
                clicked1 = true;
            }
        })
    },
    nextscene: null,
    timeout: 4000
});

scene6 = new Scene({
    act: function(){
        boro.changeAttrs(['sad', 'big', 'tall', "dopey", 'skinny']);
        speak({
            text:"But I am very <strong>Sad</strong>, I have no friend..",
            length: 9
        });
    },
    nextscene: scene7,
    timeout: 5000
});

scene5 = new Scene({
    act: function(){
        speak({
            text:"I'm <strong>Boro</strong> the <strong>Robot</strong>!",
            length: 6
        });
    },
    nextscene: scene6,
    timeout: 6000
});

scene4 = new Scene({
    act: function(next){
        subtitle({
            text:"Click On The <strong>Robot</strong>"
        });
        var clicked = false
        $('#boro').click(function(){
            if(!clicked){
                subtitle({
                    text:"<strong>Correct!!</strong>",
                    timeout:2000
                });
                next.play();
                clicked = true;
            }
        })
    },
    nextscene: scene5
});

scene3 = new Scene({
    act: function(){
        speak({
            text:"I'm a Robot!",
            length: 4
        });
    },
    nextscene: scene4,
    timeout: 2000
});

scene2 = new Scene({
    act: function(){
        speak({
            text:"What am I?",
            length: 3
        });
    },
    nextscene: scene3,
    timeout: 3400
});

scene = new Scene({
    act: function(){
        speak({
            text:"Hi, my name is <strong>Boro</strong>. And I am a <strong>Robot</strong>",
            length: 11
        });
    },
    nextscene: scene2,
    timeout: 5000
});

//========================================================================================

function pad ( val ) { return val > 9 ? val : "0" + val; }

$(document).ready(function(){
    open_mouth();
    var play = false;
    $("#boro").click(function () {
        if(!play){
            scene.play();
            setInterval( function(){
                $("#seconds").html(pad(++sec%60));
                $("#minutes").html(pad(parseInt(sec/60,10)));
            }, 1000);
        }
        play = true;
        var sec = 0;
    });
});