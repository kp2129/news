import React, { useEffect, useState } from 'react';
import { QRCodeSVG } from 'qrcode.react';


export default function Dashboard({ token, expires_at }) {
    const [qrCodeToken, setQRCodeToken] = useState(token);
    const [timer, setTimer] = useState(Math.floor((new Date(expires_at) - new Date()) / 1000));

    useEffect(() => {
        const countdown = setInterval(() => {
            setTimer((prevTime) => (prevTime > 0 ? prevTime - 1 : 0));
            console.log(timer)
        }, 1000);

        if (timer === 0) {
           
        }

        return () => clearInterval(countdown);
    }, [timer]);

    return (
        <div>
            <QRCodeSVG
                value={token}
                title={"Title for my QR Code"}
                size={128}
                bgColor={"#ffffff"}
                fgColor={"#000000"}
                level={"L"}
                marginSize={0}
                imageSettings={{
                    src: "https://yt3.googleusercontent.com/ytc/AIdro_mX26Is1Vpr6UM86tK48EFNnKSpPlcAGYeXO5_l6VNpOA=s900-c-k-c0x00ffffff-no-rj",
                    x: undefined,
                    y: undefined,
                    height: 24,
                    width: 24,
                    opacity: 1,
                    excavate: true,
                }}
            />
        </div>
    );
}

