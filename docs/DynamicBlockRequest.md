# Dynamic Block Request
In dynamic block request body, you can use Full Subscriber Data variable, that contains all subscriber’s information:

Example request payload:
```
{
    "payload": "MyPayloadHere",
    "subscriber": {{subscriber_data|fallback:""|to_json:true}},
    "user": {
        "first_name": {{first_name|fallback:""|to_json:true}},
        "last_name": {{last_name|fallback:""|to_json:true}}
    }
}

# or just use

{{subscriber_data|fallback:""|to_json:true}}
```

### Full Subscriber Data
```js
{{subscriber_data|fallback:""|to_json:true}}
```

#### User
- User ID: `{{user_id|fallback:""|to_json:true}}`
- Full Name: `{{full_name|fallback:""|to_json:true}}`
- First Name: `{{first_name|fallback:""|to_json:true}}`
- Last Name: `{{last_name|fallback:""|to_json:true}}`
- Gender: `{{gender|fallback:""|to_json:true}}`
- Locale: `{{locale|fallback:""|to_json:true}}`
- Language: `{{language|fallback:""|to_json:true}}`

#### Page
- Page ID: `{{page_id|fallback:""|to_json:true}}`
- Page Name: `{{page_name|fallback:""|to_json:true}}`

#### Chat
- Last Input Text: `{{last_input_text|fallback:""|to_json:true}}`
- Last Interaction: `{{last_interaction|fallback:""|to_json:true}}`
- Last Seen: `{{last_seen|fallback:""|to_json:true}}`
- Subscrbed: `{{subscribed|fallback:""|to_json:true}}`
- Timezone: `{{timezone|fallback:""|to_json:true}}`

#### Opt-In
- Opt-In Phone: `{{optin_phone|fallback:""|to_json:true}}`
- Phone: `{{phone|fallback:""|to_json:true}}`
- Opt-In Email: `{{optin_email|fallback:""|to_json:true}}`
- Email: `{{email|fallback:""|to_json:true}}`
