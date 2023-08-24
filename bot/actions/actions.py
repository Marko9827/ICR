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
                                "url": "/?p=ticket&id=1",
                                "type": "web_url"
                            },
                            {
                                "title": "Buy ticket", #Dugme -> Buy now
                                "url": "postback",
                                "payload": "/buynowarticle", #nlu.yml
                                "url": "/?p=checkout&id=1",
                                "type": "web_url"
                            } 
                        ]
                    } 
                ]

            }

        }

        dispatcher.utter_message(text="Here are some of our brand shoes!", attachment=new_carousel)

        return []
