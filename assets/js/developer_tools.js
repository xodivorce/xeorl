//Right-click disable
document.addEventListener('contextmenu', event => event.preventDefault());

// Disable common keyboard shortcuts for developer tools
    document.addEventListener('keydown', function(event) {
      if (event.ctrlKey && (event.key === 'I' || event.key === 'i' || event.key === 'J' || event.key === 'j' || event.key === 'U' || event.key === 'u')) {
        event.preventDefault();
      }
      if (event.key === 'F12') {
        event.preventDefault();
      }
    });

    // Detect developer tools opening
    (function() {
      const element = new Image();
      Object.defineProperty(element, 'id', {
        get: function() {
          alert('Developer tools opened!');
        }
      });
      console.log(element);
    })();