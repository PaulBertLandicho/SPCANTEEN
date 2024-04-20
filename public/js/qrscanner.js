// JavaScript code to handle QR code scanning and restart functionality
const html5Qrcode = new Html5Qrcode('reader');
const qrCodeSuccessCallback = (decodedText, decodedResult)=>{
    if(decodedText){
        document.getElementById('show').style.display = 'block';
        document.getElementById('result').textContent = decodedText;
        html5Qrcode.stop();
    }
}
const config = {fps:10, qrbox:{width:250, height:250}}
const scanButton = document.getElementById('scanButton');
const restartButton = document.getElementById('restartButton');

// Start scanning when the scan button is clicked
scanButton.addEventListener('click', () => {
    html5Qrcode.start({facingMode:"environment"}, config, qrCodeSuccessCallback);
});

// Restart scanning when the restart button is clicked
restartButton.addEventListener('click', () => {
    document.getElementById('show').style.display = 'none';
    document.getElementById('result').textContent = '';
    html5Qrcode.start({facingMode:"environment"}, config, qrCodeSuccessCallback);
});