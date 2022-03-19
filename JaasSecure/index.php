  <!DOCTYPE html>

  <?php //instead of account it was user
  if(!empty($_GET['room'])){
    $room = '"vpaas-magic-cookie-572bcefce781497ab789798973c88db0/'.htmlspecialchars($_GET['room']).'"';

  }
  else{
    echo 'OOPs! Something went wrong. Try again in few seconds!!';
  }
  
 ?>

  <html>
    <head>
      <script src='https://8x8.vc/external_api.js' async></script>
      <style>html, body, #jaas-container { height: 100%; }</style>
      <script type="text/javascript">
        let api;

        const initIframeAPI = () => {
          const domain = '8x8.vc';
          const options = {
            roomName: <?php echo $room;?>,
            parentNode: document.querySelector('#jaas-container'),
            configOverwrite: {
              // disable the prejoin page
              prejoinPageEnabled: false,
              
              //optionally we can control the mute state on join from the emebedding application
              startWithAudioMuted: [true],
              startWithVideoMuted: [true],
              disableInitialGUM: true,
              // toolbarButtons: ['camera','chat','closedcaptions','desktop','download','embedmeeting','etherpad','filmstrip',
              //                   'fullscreen','hangup','help','livestreaming','microphone','participants-pane','profile',
              //                   'raisehand','recording','security','settings','shareaudio','sharedvideo','shortcuts','tileview',
              //                   'toggle-camera','videoquality', '__end']
            },
              // optionally, we can have the meeting select the devices we want
              devices: {
                audioInput: '<deviceLabel>',
                audioOutput: '<deviceLabel>',
                videoInput: '<deviceLabel>'
              },
              interfaceConfigOverwrite: { SETTINGS_SECTIONS: [ 'devices', 'language', 'moderator', 'calendar', 'sounds' ] },
              // userInfo: {
              // displayName: ' '
              // },
          };
          api = new JitsiMeetExternalAPI(domain, options);
        }

        window.onload = () => {
            initIframeAPI();
          }
      
      </script>
    </head>
    <body><div id="jaas-container" /></body>
  </html>