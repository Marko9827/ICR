# This files contains your custom actions which can be used to run
# custom Python code.
#
# See this guide on how to implement these action:
# https://rasa.com/docs/rasa/custom-actions


# This is a simple example for a custom action which utters "Hello World!"

from typing import Any, Text, Dict, List 
from rasa_sdk import Action, Tracker
from rasa_sdk.executor import CollectingDispatcher
from rasa_sdk.events import SlotSet
from datetime import datetime

class CurrentTime(Action):
    def name(self) -> Text:
        return "logout_mef"
    
    def run(self, dispatcher: CollectingDispatcher,
            tracker: Tracker,
            domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:
        current_time = datetime.now().strftime("%H:%M:%S")
        dispatcher.utter_message(f"The current time is {current_time}.")
        return []

class CurrentTime(Action):
    def name(self) -> Text:
        return "current_time"
    
    def run(self, dispatcher: CollectingDispatcher,
            tracker: Tracker,
            domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:
        current_time = datetime.now().strftime("%H:%M:%S")
        dispatcher.utter_message(f"The current time is {current_time}.")
        return []

class HandlePayloadAction(Action):
    def name(self) -> Text:
        return "action_handle_payload"

    def run(self, dispatcher: CollectingDispatcher,
            tracker: Tracker,
            domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:
        payload = tracker.get_slot("payload")

        if payload == "/open_link":
            return [SlotSet("payload", "/open_link")]

        return []

class ActionLogout(Action):
    def name(self) -> Text:
        return "action_open_link"

    def run(self, dispatcher: CollectingDispatcher,
            tracker: Tracker,
            domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:
        dispatcher.utter_message(response="utter_logout")
        return []
 

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
                                "title": "Details",  # details -> kao dugme
                                "url": "/?p=flight&id=1",
                                "type": "web_url"
                            },
                            {
                                "title": "Buy ticket",  # Dugme -> Buy now
                                "url": "postback",
                                "payload": "/buynowticket",  # nlu.yml
                                "url": "/?p=checkout&id=0",
                                "type": "web_url"
                            }
                        ]
                    },
                    {
                        "title": "Egypt - Ticket",
                        "subtitle": "Price: $1500",
                        "image_url": "http://localhost:3001/?f=flight_1.png",
                        "buttons": [
                            {
                                "title": "Details",  # details -> kao dugme
                                "url": "/?p=flight&id=1",
                                "type": "web_url"
                            },
                            {
                                "title": "Buy ticket",  # Dugme -> Buy now
                                "url": "postback",
                                "payload": "/buynowticket",  # nlu.yml
                                "url": "/?p=checkout&id=1",
                                "type": "web_url"
                            }
                        ]
                    },
                    {
                        "title": "Paris - Ticket",
                        "subtitle": "Price: $100 - 800",
                        "image_url": "http://localhost:3001/?f=flight_2.png",
                        "buttons": [
                            {
                                "title": "Details",  # details -> kao dugme
                                "url": "/?p=flight&id=2",
                                "type": "web_url"
                            },
                            {
                                "title": "Buy ticket",  # Dugme -> Buy now
                                "url": "postback",
                                "payload": "/buynowticket",  # nlu.yml
                                "url": "/?p=checkout&id=2",
                                "type": "web_url"
                            }
                        ]
                    }
                ]

            }

        }
        lgout = {
            "type": "template",
            "payload": {
                "template_type": "generic",
                "elements": [
                    {
                        "buttons": [
                            {
                                "title": "Logout",  # details -> kao dugme
                                "url": "/?p=logout",
                                "type": "web_url"
                            }
                        ]
                    }]
            }
        }

        dispatcher.utter_message(
            text="Here are some of our locations to visit!", attachment=new_carousel)

        return []
