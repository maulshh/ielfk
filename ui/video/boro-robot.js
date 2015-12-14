var boro = new makeSovog({
    name: 'boro',
    body: '#DE2226',
    arm: '#787878' ,
    eye: '#000000',
    looking: "-1.7em",
    attr: ['big', 'tall', 'skinny'],
    speed: 2,
    click: function(){
    },
}), friend1;

var scene, scene2, scene3, scene4, scene5, scene6;

var scene7 = new Scene({
    act: function(){
        friend1 =  new makeSovog({
            name: 'friend1',
            body: '#6792AB',
            arm: '#787878' ,
            eye: '#000000',
            click: function(){
            },
            destroy: true
        });
        speak({
			robot: boro,
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
                if(this.nextscene != null || this.nextscene != undefined)
                    this.nextscene.play();
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
			robot: boro,
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
			robot: boro,
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
			robot: boro,
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
			robot: boro,
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
			robot: boro,
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