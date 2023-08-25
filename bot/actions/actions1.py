# This files contains your custom actions which can be used to run
# custom Python code.
#
# See this guide on how to implement these action:
# https://rasa.com/docs/rasa/custom-actions


# This is a simple example for a custom action which utters "Hello World!"

from typing import Any, Text, Dict, List
from rasa_sdk import Action, Tracker
from rasa_sdk.executor import CollectingDispatcher


class ActionLogout(Action):

    def name(self) -> Text:
        return "Action_logout"

    def run(self, dispatcher: CollectingDispatcher,
            tracker: Tracker,
            domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:

        logout_hmm = {
            "type": "template",
            "payload": {
                "template_type": "generic",
                "elements": [
                    {
                        "buttons": [
                            {
                                "title": "Details",  # details -> kao dugme
                                "url": "/?p=flight&id=1",
                                "type": "web_url"
                            }
                        ]
                    }
                ]
            }
        }

        dispatcher.utter_message(
            text="Logout? Sure?", attachment=logout_hmm)

        return []
