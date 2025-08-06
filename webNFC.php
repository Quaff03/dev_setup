<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Web NFC Example</title>
        <script src="/js/nfc.js"></script>
        <style>
            *{
                margin: 0;
                padding: 0;
                text-align: center;
                
            }

            body {
                font-family: Arial, sans-serif;
                margin: 20px;
            }
            button {
                padding: 10px 20px;
                font-size: 16px;
            }
            #status {
                margin-top: 20px;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <h1>Web NFC Example</h1>
        <button id="readNFC">读取 NFC 标签</button>
        <button id="writeNFC">写入 NFC 标签</button>
        <div id="status"></div>
    </body>
</html>
    <script>
        if (!('NDEFReader' in window)) {
            document.getElementById('status').textContent = '浏览器不支持 NFC 读取功能';
            document.getElementById('readNFC').disabled = true;
            document.getElementById('writeNFC').disabled = true;
            alert('您的浏览器不支持 NFC 读取功能，请升级到最新版本的浏览器');
        }
    </script>



    <script>
        document.getElementById('readNFC').addEventListener('click', async () => {
            try {
                const ndef = new NDEFReader();
                await ndef.scan();
                document.getElementById('status').textContent = '请将 NFC 标签靠近设备...';
                
                ndef.onreading = event => {
                    const message = event.message;
                    let text = '';
                    for (const record of message.records) {
                        if (record.recordType === 'text') {
                            text += record.data + ' ';
                        }else{
                            text += `未知记录类型: ${record.recordType} `;
                        }
                    }
                    document.getElementById('status').textContent = `读取到的内容: ${text}`;
                };
            } catch (error) {
                document.getElementById('status').textContent = `读取失败: ${error}`;
            }
        });

        document.getElementById('writeNFC').addEventListener('click', async () => {
            try {
                const ndef = new NDEFReader();
                await ndef.write({
                    records: [{
                        recordType: 'text',
                        data: 'Hello, NFC!'
                    }]
                });
                document.getElementById('status').textContent = '写入成功!';
            } catch (error) {
                document.getElementById('status').textContent = `写入失败: ${error}`;
            }
        });
    </script>
