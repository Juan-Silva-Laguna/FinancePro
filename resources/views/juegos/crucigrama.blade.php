<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUCIGRAMA</title>
    <style>
        body {
        /* background: #1D1E22; */
        font-family: 'Open Sans', sans-serif;
        }

        *,
        *:before,
        *:after {
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box; }

        .crw-container {
        position: relative;
        max-width: 500px;
        height: 500px;
        margin: 30px auto;
        }

        .crw-container .crw-wordlist {
        display: none;
        }

        .crw-grid {
        height: 100%;
        }

        .crw-grid > div {
        background: rgba(255,255,255,.1);
        border-bottom: 1px solid rgba(0,0,0,.6);
        border-right: 1px solid rgba(0,0,0,.6);
        float: left;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        color: #222;
        position: relative;
        }

        .crw-grid > div.full {
        background: rgba(255,255,255,.6);
        }

        .crw-grid > div input {
        width: 100%;
        border: 0;
        background: #c9c9c9;
        text-align: center;
        height: 100%;
        }

        .crw-grid > div input:focus {
        outline: 1px dashed #2BB673;
        background: #f1f1f1;
        }

        .crw-grid > div svg {
        position: absolute;
        width: 80%;
        cursor: pointer;
        }

        .crw-grid > div svg.direction-h {
        left: -90%;
        top: 10%;
        }

        .crw-grid > div svg.direction-v {
        top: -90%;
        left: 10%;
        }

        .crw-grid > div.direction-h-init:before {
        position: absolute;
        content: '';
        top: 50%;
        left: 0;
        width: 0;
        height: 0;
        margin-top: -8px;
        border-top: 8px solid transparent;
        border-left: 10px solid #2BB673;
        border-bottom: 8px solid transparent;
        pointer-events: none;
        }

        .crw-clues {
        display: none;
        }

        .crw-grid > div.direction-v-init:after {
        position: absolute;
        content: '';
        left: 50%;
        top: 0;
        width: 0;
        height: 0;
        margin-left: -8px;
        border-left: 8px solid transparent;
        border-right: 8px solid transparent;
        border-top: 10px solid #2BB673;
        pointer-events: none;
        }

        .crw-grid > div svg path {
        fill: #2BB673;
        }

        .crw-grid > div svg:hover path {
        fill: #1ac974;
        }

        .tippy-content {
        max-width: 150px!important;
        }
    </style>
</head>
<body>
    <center>  <h1>CRUCIGRAMA</h1></center>

    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700|Open+Sans:400,600" rel="stylesheet" />
    <div class="crw-container">
    <ul class="crw-wordlist">
        <li>espermatozoide</li>
        <li>fecundacion</li>
        <li>prostata</li>
        <li>falopio</li>
        <li>ovulo</li>
        <li>uretra</li>
        <li>ovario</li>
        <li>juancho</li>
    </ul>
    
    <div class="crw-grid">
        
    </div>
    
    <div class="crw-clues">
        
            <div data-word="prostata">Glándula localizada debajo de la vejiga, esta constituida por tejido glandular que se comunican por túbulos con la uretra.</div>
        
            <div data-word="espermatozoide">Célula germinal masculina.</div>
            <div data-word="fecundacion">Unión del ovulo y es espermatozoide para formar un nuevo individuo.</div>
            <div data-word="falopio">(trompas de) Órganos que se comunican directamente con el útero y se encuentran a cada lado de este.</div>
            <div data-word="ovulo">Célula germinal femenina.</div>
            <div data-word="uretra">Conducto por el cual se da la expulsión al exterior de la orina y los líquidos seminales.</div>
            <div data-word="ovario">Es la gónada encargada de la producción de hormonas sexuales y de la reproducción femenina.</div>
            <div data-word="juancho">Es mi sobrenombre.</div>
        </div>
    </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://unpkg.com/tippy.js@3/dist/tippy.all.min.js"></script>

<script>
    var crossWord = function crossWord( $container, options ) {
   
        this.words = [];
        this.options = options;
        this.slots = [];
        this.$container = $container;
        this.init();
        this.prevDir = false;
    
    }

    crossWord.prototype = {
        
        init: function () {
        
        var proto = this;
        
        proto.$container.find('.crw-wordlist li').each(function(){
            proto.words.push( $(this).text().replace(/ /g, "") );
        });

        proto.arrange()
        
        proto.draw()
        
        }, // this.init()
    
        setSlots: function() {
        
        this.slots = [];
        
        for (var i = 0; i < this.options.size * this.options.size; i++) {
            this.slots.push(-1); 
        }
        
        },
    
        arrange: function () {
        
        this.drawCounter++;
        
        var proto = this,
            rowSize = proto.options.size;
        
        if ( proto.options.shuffle ) proto.words = shuffle(proto.words)
        proto.setSlots()
        proto.placedWords = []
        
        var maxPos = proto.slots.length;
        
        for (var i = 0; i < proto.words.length; i++) {
            
            if ( proto.placedWords.length ) {
                
                placedLoop:
                for (var j = 0; j < proto.placedWords.length; j++) {
                    
                    var placedWord = proto.placedWords[j].word;
                    
                    for (var k = 0; k < placedWord.length; k++) {
                            
                        var placedLetter = placedWord.charAt(k);

                        for (var l = 0; l < proto.words[i].length; l++) {

                            var protoLetter = proto.words[i].charAt( l );

                            if ( placedLetter === protoLetter ) {
                            
                            var placedStart = proto.placedWords[j].start,
                                placedDir = proto.placedWords[j].direction,
                                start = placedDir === 'h' ? ( placedStart + k ) - ( rowSize * l ) : ( placedStart + ( rowSize * k) ) -  l,
                                dir = placedDir === 'h' ? 'v' : 'h';

                            if ( isThereSlot( start, proto.words[i], dir ) ) {
                                
                                insertWord( start, proto.words[i], dir )
                                
                                break placedLoop;
                                
                            }

                            }

                        }
                        
                    }
                    
                }
                
            } else {
                
                do {
                    
                    var startPoint = getRandomInt(0, maxPos)
                    
                }
                while ( !isThereSlot( startPoint, proto.words[i], startPoint % 2 ? 'h' : 'v' ) );
                
                insertWord( startPoint, proto.words[i], startPoint % 2 ? 'h' : 'v' )
                
            }
            
        }
        
        if ( proto.placedWords.length < proto.words.length ) proto.arrange()

        function insertWord( initialPos, word, direction ) {
    
            for (var i = 0; i < word.length; i++) {

                var letterPos = direction == 'h' ? initialPos + i : initialPos + (i*rowSize),
                    crossed = false, crossedIndex = false;
                
                if ( proto.slots[ letterPos ] !== -1 ) { 
                    
                    crossed = proto.slots[ letterPos ].word;
                    crossedIndex = proto.slots[ letterPos ].letterIndex;
                    //console.log( crossedIndex )
                    
                }

                proto.slots[ letterPos ] = {
                    word: word,
                    letter: word[i],
                    direction: direction,
                    letterIndex: i
                }
                
                if ( crossed ) {
                    
                    proto.slots[ letterPos ].crossed = crossed;
                    proto.slots[ letterPos ].crossedIndex = crossedIndex;
                    
                }

            }
            
            proto.placedWords.push({
                word: word,
                direction: direction,
                start: initialPos
            })
            
        } // insertword()
        
        function isThereSlot( start, word, dir ) {

            var avalaiblePos = rowSize - (start % rowSize),
                crossed = false;

            for (var i = 0; i < word.length; i++) {

                var letterPos = dir == 'h' ? start + i : start + (i * rowSize),
                    currentSlot = proto.slots[letterPos],
                    siblingLess = dir == 'h' ? letterPos - rowSize : letterPos - 1,
                    siblingMore = dir == 'h' ? letterPos + rowSize : letterPos + 1,
                    beforeWord = dir == 'v' ? letterPos - rowSize : letterPos - 1,
                    afterWord = dir == 'v' ? letterPos + rowSize : letterPos + 1;

                // return false if there is no room (h)
                if ( avalaiblePos < word.length && dir == 'h' ) return false

                // return false if there is no room (v)
                if ( letterPos > maxPos && dir == 'v') return false

                if ( currentSlot !== -1 ) {
                
                // return false if the slot is taken by a different letter
                if ( currentSlot ) if ( currentSlot.letter !== word[i] ) return false
                
                }

                // return false if the slot is free but siblings are taken
                if ( currentSlot === -1 && ( proto.slots[siblingLess] !== -1 || proto.slots[siblingMore] !== -1 ) ) return false

                // return false if the slot before the first letter is taken
                if ( i === 0 && proto.slots[beforeWord] !== -1 ) return false

                // return false if the slot after the last letter is taken
                if ( i === word.length - 1 && proto.slots[afterWord] !== -1 ) return false

            }

            return true

        } // isThereSlot()
        
        function shuffle(array) {

            var currentIndex = array.length, temporaryValue, randomIndex;

            // While there remain elements to shuffle...
            while (0 !== currentIndex) {

                // Pick a remaining element...
                randomIndex = Math.floor(Math.random() * currentIndex);
                currentIndex -= 1;

                // And swap it with the current element.
                temporaryValue = array[currentIndex];
                array[currentIndex] = array[randomIndex];
                array[randomIndex] = temporaryValue;
            }

            return array;
            } // shuffle()

            function getRandomInt(min, max) {
                return Math.floor(Math.random() * (max - min)) + min;
            } // getRandomInt()
        
        }, // this.arrange()
    
    draw: function() {
        
        var proto = this,
            rowSize = proto.options.size,
            $grid = this.$container.find('.crw-grid');
        
        for (var i = 0; i < proto.slots.length; i++) {
            
            var $cell = $('<div style="width:'+(100/rowSize)+'%;height:'+(100/rowSize)+'%;" />');
            
            if ( proto.slots[i] !== -1 ) {
                
                var letterObj = proto.slots[i],
                    $input = $('<input maxlength="1" '+
                                'data-word="'+ letterObj.word
                            +'" data-direction="'+ letterObj.direction
                            +'" data-letter="'+ letterObj.letter
                            +'" type="text" />')
                
                if ( letterObj.crossed ) $input.attr('data-crossed', letterObj.crossed);
                
                $cell.addClass('direction-' + letterObj.direction);
                
                $cell.html( $input );
                
                if ( letterObj.letterIndex == 0 ) {
                
                $cell.addClass('direction-' + letterObj.direction + '-init');
                
                $cell.append( '<svg data-word="'+ letterObj.word +'" version="1.1" class="direction-'+ letterObj.direction  +'" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-290 382 24 24" style="enable-background:new -290 382 24 24;" xml:space="preserve"> <path d="M-278,382c-6.6,0-12,5.4-12,12s5.4,12,12,12s12-5.4,12-12S-271.4,382-278,382z M-277,400h-2v-7h2V400z M-278,390.5 c-0.8,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5s1.5,0.7,1.5,1.5S-277.2,390.5-278,390.5z"/> </svg>' );
                
                }
                
                if ( letterObj.crossed ) {
                    
                if ( letterObj.crossedIndex == 0 ) {
                    
                    console.log('crossed tooltip');

                    var crossedDir = letterObj.direction === 'h' ? 'v' : 'h';
                    
                    $cell.addClass('direction-' + crossedDir + '-init');

                    $cell.append( '<svg version="1.1" data-word="'+ letterObj.crossed +'" class="direction-'+ crossedDir  +'" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-290 382 24 24" style="enable-background:new -290 382 24 24;" xml:space="preserve"> <path d="M-278,382c-6.6,0-12,5.4-12,12s5.4,12,12,12s12-5.4,12-12S-271.4,382-278,382z M-277,400h-2v-7h2V400z M-278,390.5 c-0.8,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5s1.5,0.7,1.5,1.5S-277.2,390.5-278,390.5z"/> </svg>' );

                }
                    
                }
                
                $cell.addClass('full');
                
                $cell.find('svg').on('click', function(e){
                $(this).siblings('input').focus();
                proto.prevDir = $(this).hasClass('direction-h') ? 'h' : 'v';
                console.log( proto.prevDir )
                });
                
                $cell.find('svg').each(function(){
                
                var $svg = $(this),
                    content = null;
                
                proto.$container.find('.crw-clues > div').each(function(){
                    if ( $(this).data('word') === $svg.data('word') ) content = $(this).text()
                })
                
                tippy(this, { 
                    content: content,
                    placement: $svg.hasClass('direction-h') ? 'left' : 'top',
                    delay: 100,
                    flip: false,
                    arrow: true,
                    interactive: true,
                    size: 'small',
                    duration: 300,
                    animation: 'shift-toward'
                })
                });
                
                $input.on('click', function(e){
                proto.prevDir = false;
                });
                
                $input.on('keyup', function(e){
                    
                var KeyID = e.keyCode,
                    $this = $(this),
                    back = KeyID == 8 || KeyID == 46,
                    currentIndex = $this.parent('div').index(),
                    nextDir = proto.prevDir || $this.data('direction'),
                    nextIndex = nextDir == 'h' ? back ? currentIndex - 1 : currentIndex + 1 : back ? currentIndex - rowSize : currentIndex + rowSize,
                    nextInput = $this.parents('.crw-grid').children().eq( nextIndex ).children('input');
                
                    console.log($this.val());
                    console.log($this.data('letter'));
                    console.log($this.data('word'));

                if ($this.val() != $this.data('letter')) {
                    alert("la letra no coincide");
                    $this.val("");
                }else{

                    if ( nextInput ) {
                        
                        nextInput.focus();
                        
                        console.log( $this.parents('.crw-grid').children().eq( nextIndex )[0] )
                        
                        proto.prevDir = nextDir;
                        
                    } else {
                        
                        proto.prevDir = false;
                        
                    }  
                }

                validar();
                });
                
            }
            
            $grid.append( $cell );
            
        }
        
        function isLowerCase(str){
            return str == str.toLowerCase() && str != str.toUpperCase();
        }

        function validar() {
            var inputs = document.querySelectorAll('input[type="text"]');
            var todosTienenValor = true;

            inputs.forEach(function(input) {
                if (input.value === '') {
                todosTienenValor = false;
                return;
                }
            });

            if (todosTienenValor) {
                alert('¡Todos los campos tienen valor! ACUMULAR PUNTOS');
            } 
        }
        
    } // proto.draw()
    
    } // proto

    console.log(crossword);
    
    var crossword = new crossWord( $('.crw-container'), {
    size: 16,
    shuffle: true
    });
    console.log(crossword);


</script>
</html>

