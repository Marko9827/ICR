# ICR Project

Run f_b(frond - backend) only by Apache, nginx,...

But you can run by this command: ``cd f_b`` and ``composer run sta`` or ``php -s localhost:3001 -dev``

Link: [http://localhost:3001](http://localhost:3001/f_b/)/

Github respository: [https://github.com/Marko9827/ICR](https://github.com/Marko9827/ICR "Git respository")

```
rasa run actions && rasa run -m models --enable-api --cors "*" --debug
```

# Required for starting project

* Anaconda: [https://www.anaconda.com/download](https://www.anaconda.com/download)
* Python: [https://www.python.org/downloads/](https://www.python.org/downloads/)
* PHP 7.4 or 8.*
* C++
  * Download for: [ARM64](https://aka.ms/vs/17/release/vc_redist.x64.exe)
  * Download for: [X86](https://aka.ms/vs/17/release/vc_redist.x86.exe)
  * Download for: [X64](https://aka.ms/vs/17/release/vc_redist.x64.exe)
  * More info: [https://learn.microsoft.com/cpp](https://learn.microsoft.com/cpp)

# Bot lasted tests

Intent Histogram
![1692969699078](./bot/results/intent_histogram.png)

Intent confusion Matrix
![1692969699078](./bot/results/intent_confusion_matrix.png)

Story Confusion Matrix
![1692969699078](./bot/results/story_confusion_matrix.png)

# Screenshots

This is what the home page looks like, with available flights. Every flight has an Info I Book a ticket button.
Registration is required for Book a ticket.

![1692969699078](./ICR/ICR_1.png)

Show available tickets in chatbot

![1692969699078](./ICR/ICR_2.png)

Purchase/Reservation of tickets for the selected flight, Airport of departure, time and arrival and number of seats.

![16929696993078](./ICR/ICR_3.png)

Information about one of the destinations [Full screenshot of the page]

![1692aer9696993078](./ICR/ICR_4.png)

Journal view of tickets [ Completed (flight, green) , upcoming (purple), and canceled (order) ]

![169aer2969699078](./ICR/ICR_5.png)

Journal view of tickets [ Comments and raiting tickets ]

![169aer2969699078](./ICR/ICR_6.png)

# Video tutorial / presentation Click to bottom image

[![Watch the video](https://img.youtube.com/vi/na_LhwSpzOE/maxresdefault.jpg)](https://youtu.be/na_LhwSpzOE)

# Info page [ Full size ]

---

![169aer2969699078](./ICR/ICR_8.png)
