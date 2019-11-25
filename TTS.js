var synth = window.speechSynthesis;

var inputTxt = document.querySelector('.txt');
var voiceSelect = document.querySelector('select');

// var pitch = document.querySelector('#pitch');
// var pitchValue = 1;
// var rate = document.querySelector('#rate');
// var rateValue = 1;

var voices = [];


function populateVoiceList() {
    voices = synth.getVoices();
    
    for (i = 0; i < voices.length; i++) {
        var option = document.createElement('option');
        option.textContent = voices[i].name + ' (' + voices[i].lang + ')';

        if (voices[i].default) {
            option.textContent += ' -- DEFAULT';
        }

        option.setAttribute('data-lang', voices[i].lang);
        option.setAttribute('data-name', voices[i].name);
        voiceSelect.appendChild(option);
    }
}

populateVoiceList();
if (speechSynthesis.onvoiceschanged !== undefined) {
    speechSynthesis.onvoiceschanged = populateVoiceList;
}

window.onload = function (event) {
    event.preventDefault();

    var utterThis = new SpeechSynthesisUtterance(inputTxt.innerText);
    // var selectedOption = voiceSelect.selectedOptions[0].getAttribute('data-name');
    for (i = 0; i < voices.length; i++) {
        if (voices[i].lang === "en-GB") {
            utterThis.voice = voices[i];
        }
    }
    // utterThis.voice = en-GB;
    utterThis.pitch = 1;
    utterThis.rate = 1;
    synth.speak(utterThis);

    utterThis.onpause = function (event) {
        var char = event.utterance.text.charAt(event.charIndex);
        console.log('Speech paused at character ' + event.charIndex + ' of "' +
            event.utterance.text + '", which is "' + char + '".');
    }

    inputTxt.blur(); //hides keyboard
}