<div class="bot_btn"><i class="bi bi-chat-dots"></i></div>
<style>
    .rw-conversation-container .rw-header {
        background-color: hsl(307, 71%, 27%);
    }

    .rw-conversation-container .rw-messages-container .rw-message .rw-client {
        background-color: hsl(0, 62%, 29%);
    }

    .rw-conversation-container .rw-messages-container .rw-message .rw-client .rw-message-text {
        color: hsla(55, 100%, 63%, 0.862);
    }

    .rw-launcher {
        background-color: #b52626;
    }

    .rw-conversation-container .rw-reply {
        background-color: #b52626;
        border: 1px #b52626 solid;
    }
</style>

<script>
    !(function() {
        let e = document.createElement("script"),
            t = document.head || document.getElementsByTagName("head")[0];
        (e.src =
            "https://cdn.jsdelivr.net/npm/rasa-webchat/lib/index.js"),
        // Replace 1.x.x with the version that you want
        (e.async = !0),
        (e.onload = () => {
            window.WebChat.default({
                    title: 'IRC AIR',
                    initPayload: '/greet',
                    customData: {
                        language: "en"
                    },
                    socketUrl: "http://localhost:5005",
                    // add other props here
                    profileAvatar: "./img/bot.png",
                    openLauncherImage: "./img/chat.png",
                    showFullScreenButton: true,
                    showMessageDate: true,
                    inputTextFieldHint: 'What is in your mind..?'
                },
                null
            );
        }),
        t.insertBefore(e, t.firstChild);
    })();
</script>