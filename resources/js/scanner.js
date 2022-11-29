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

        // Redirect to QR code data page or check in/out page
        let scanner = document.getElementById("scanner-type");
        var scannerType = scanner.getAttribute("data-scanner-type");
        switch (scannerType) {
            case "details":
                window.location.href = "/visitors/view/" + parsedUID;
                break;
            case "check-in":
                window.location.href = "/visitors/checkin/verify/" + parsedUID;
                break;
            case "check-out":
                window.location.href = "/visitors/checkout/verify/" + parsedUID;
                break;
            default:
                window.location.href = "/visitors/view/" + parsedUID;
                break;
        }
    }
  }

  function onScanFailure(error) {

  }

  let html5QrcodeScanner = new Html5QrcodeScanner(
    "reader",
    { fps: 10, qrbox: {width: 1000, height: 1000} },
    /* verbose= */ false);
  html5QrcodeScanner.render(onScanSuccess, onScanFailure);
