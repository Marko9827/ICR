# This files contains your custom actions which can be used to run
# custom Python code.
#
# See this guide on how to implement these action:
# https://rasa.com/docs/rasa/custom-actions


# This is a simple example for a custom action which utters "Hello World!"

from typing import Any, Text, Dict, List

from rasa_sdk import Action, Tracker
from rasa_sdk.executor import CollectingDispatcher


class ActionCarousel(Action):

    def name(self) -> Text:
        return "actions_list"

    def run(self, dispatcher: CollectingDispatcher,
            tracker: Tracker,
            domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:


        new_carousel = {
            "type": "template",
            "payload": {
                "template_type": "generic",
                "elements": [
                    {
                        "title": "Russia - Ticket",
                        "subtitle": "Price: $900",
                        "image_url": "http://localhost:3001/?f=flight_0.png",
                        "buttons": [
                            {
                                "title": "Details", #details -> kao dugme
                                "url": "http://localhost:3001/?f=flight_0.png",
                                "type": "web_url"
                            },
                            {
                                "title": "Kupi: obuca.rs", #Dugme -> Buy now
                                "url": "postback",
                                "payload": "/buynowarticle", #nlu.yml
                                "url": "https://us.puma.com/us/en/cart",
                                "type": "web_url"
                            },
                            {
                                "title": "Size", #Size obuce
                                "type": "postback",
                                "payload": "/size" #nlu.yml
                            }
                        ]
                    },
                    {
                        "title": "Viz Runner Repeat Men's Running Sneakers",
                        "subtitle": "Price: $29.99",
                        "image_url": "https://images.puma.com/image/upload/f_auto,q_auto,b_rgb:fafafa,w_600,h_600/global/377333/01/sv03/fnd/PNA/fmt/png/Viz-Runner-Repeat-Men's-Running-Sneakers",
                        "buttons": [
                            {
                                "title": "Details", #details -> kao dugme
                                "url": "https://us.puma.com/us/en/pd/viz-runner-repeat-mens-running-sneakers/377333?swatch=01&size=0160",
                                "type": "web_url"
                            },
                            {
                                "title": "Buy now", #Dugme -> Buy now
                                "url": "postback",
                                "payload": "/buynowarticle" #nlu.yml
                            },
                            {
                                "title": "Size", #Size obuce
                                "url": "postback",
                                "payload": "/size" #nlu.yml
                            }
                        ]
                    }
                ]

            }

        }

        dispatcher.utter_message(text="Here are some of our brand shoes!", attachment=new_carousel)

        return []
