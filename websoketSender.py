import serial
import random
import asyncio
import websockets

def main():
    # コーディング１
    deviceName = '/dev/tty.usbmodemFA132'
    comport = serial.Serial(deviceName, 115200,  parity=serial.PARITY_NONE)
    # clear receive buffer
    comport.reset_input_buffer()
    # send data
    if comport.out_waiting > 0:
        comport.reset_output_buffer()

    try:
        print("Send data from Micro Bit with in 3 seconds!")
        data_raw = comport.read(10)
        if (data_raw != ""):
            return data_raw
        else:
            print("It is Time out try one more!")

    except:
        print("Error")
    else:
        print("End Program")
        comport.close()

async def hello(mes):
    async with websockets.connect("ws://zenryokuservice.com:9000/demo/server.php") as websocket:
        colors = ('#007AFF','#FF7000','#FF7000','#15E25F','#CFC700','#CFC700','#CF1100','#CF00BE','#F00')
        num = random.randint(0,8)
        print(colors[num])
        mes = '{"message": "' + mes + '","name": "Takunoji","color": "' + colors[num] +'"}'
        await websocket.send(mes)
        await websocket.close()

if __name__ == '__main__':
#    mes = main()
#    print(mes.decode('utf-8'))
    asyncio.get_event_loop().run_until_complete(hello("Testing!COMEON"))
#    asyncio.get_event_loop().run_until_complete(hello(mes.decode('utf-8')))
