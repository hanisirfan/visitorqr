import {Html5QrcodeScanner} from "html5-qrcode"

function onScanSuccess(decodedText, decodedResult) {

    // Parsing decoded text
    // It must starts with formqr-code
    if (decodedText.split(": ")[0] != "visitorqr") {
        document.getElementById("qr-error").removeAttribute("hidden");

        setTimeout(() => {
            document.getElementById("qr-error").setAttribute("hidden", false);
        }, 1500);
    } else {
        let parsedUID = decodedText.split(": ")[1];

        // Redirect to QR code data page
        window.location.href = "/visitors/view/" + parsedUID;
    }
  }

  function onScanFailure(error) {

  }

  let html5QrcodeScanner = new Html5QrcodeScanner(
    "reader",
    { fps: 10, qrbox: {width: 250, height: 250} },
    /* verbose= */ false);
  html5QrcodeScanner.render(onScanSuccess, onScanFailure);
