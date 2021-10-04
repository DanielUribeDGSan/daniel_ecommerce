curl -X POST -H "Authorization: key=AAAAhA4_pNQ:APA91bFD87uxzAD0Ym7znau6eGR9_QNWUTQRT-Psu0ZPUhkN7gUgRnzWouX9Kgfi1t5pLGx-FjQYhf7z6W_XCuMKjuU-_JLkx_4U1Llwlm1knfHSQ4XG-bHXUX0Gu1UX7rVOKxZr_v3-" \
   -H "Content-Type: application/json" \
   -d '{
        "data": {
            "notification": {
                "title": "GRIJALVAROMERO",
                "body": "Este es un mensaje asdsadsad",
                "icon": "http://localhost/notificaciones/img/icon.png",
            }
        },
        "to": "TOKEN_CLIENTE"
}' https://fcm.googleapis.com/fcm/send