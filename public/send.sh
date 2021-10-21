curl -X POST -H "Authorization: key=AAAAhA4_pNQ:APA91bFD87uxzAD0Ym7znau6eGR9_QNWUTQRT-Psu0ZPUhkN7gUgRnzWouX9Kgfi1t5pLGx-FjQYhf7z6W_XCuMKjuU-_JLkx_4U1Llwlm1knfHSQ4XG-bHXUX0Gu1UX7rVOKxZr_v3-" \
   -H "Content-Type: application/json" \
   -d '{
        "data": {
            "notification": {
                "title": "GRIJALVAROMERO",
                "body": "Este es un mensaje asdsadsad",
                "icon": "https://images.squarespace-cdn.com/content/v1/5f62b687cae73d2408a06539/1602807735303-4W086W30YX6B3D23N04L/image-asset.png",
            }
        },
        "to": "dFiLFyv4eAhOvU2e--272p:APA91bHOZ26rC_dmW48XQTJyMm2NrTLiT5yfxrUlmJNiyZ0O5rIHEw1iBDvAsHBJhNfV0k-2PHCab8NiMmLepc4sak8YoHBE_JBO0u-elHCGZcG4ivphPKyV_pxmShtO-SVcQ517VJ7J"
}' https://fcm.googleapis.com/fcm/send