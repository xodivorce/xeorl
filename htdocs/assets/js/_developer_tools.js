(function() {
    function checkDevTools() {
        console.clear();
        console.log('%cSTOP!', 'color: red; font-size: 50px; font-weight: bold;');
        console.log('%cThis is a browser feature intended for developers.', 'color: white; background: red; font-size: 16px; padding: 5px;');
        console.log('%cIf someone told you to copy-paste something here to enable a premium feature or "hack" someone\'s account, it is a scam and will give them access to your Xeorl account.', 'color: white; background: black; font-size: 14px; padding: 5px;');
    }

    function detectDevTools() {
        const threshold = 160;
        const widthThreshold = 400;

        if (
            window.outerHeight - window.innerHeight > threshold ||
            window.outerWidth - window.innerWidth > widthThreshold
        ) {
            checkDevTools();
        }
    }

    window.addEventListener('resize', detectDevTools);
    setInterval(detectDevTools, 1000);
})();
