import React, { useState } from 'react';
import { Button, StyleSheet, Text, TouchableOpacity, View, Alert, Dimensions } from 'react-native';
import { CameraView, CameraType, FocusMode, useCameraPermissions } from 'expo-camera';
import { useIsFocused } from '@react-navigation/native';

export default function QRScannerScreen() {
  const [facing, setFacing] = useState<CameraType>('front');
  const [autofocus, setFocus] = useState<FocusMode>('on');
  const [permission, requestPermission] = useCameraPermissions();
  const [scanned, setScanned] = useState(false);
  const isFocused = useIsFocused();

  const { width, height } = Dimensions.get('window');
  const frameSize = 250;
  const overlayColor = 'rgba(0, 0, 0, 0.6)';

  const handleBarCodeScanned = ({ type, data }) => {
    setScanned(true);
    Alert.alert('QR Code Scanned!', `Type: ${type}\nData: ${data}`);
  };

  if (!permission) {
    return <View />;
  }

  if (!permission.granted) {
    return (
      <View style={styles.container}>
        <Text style={styles.message}>We need your permission to show the camera</Text>
        <Button onPress={requestPermission} title="grant permission" />
      </View>
    );
  }

  return (
    <View style={styles.container}>
      {isFocused && (
        <>
          <CameraView
            style={styles.camera}
            facing={facing}
            autofocus={autofocus}
            barcodeScannerSettings={{
              barcodeTypes: ['qr'],
            }}
            onBarcodeScanned={scanned ? undefined : handleBarCodeScanned}
          />

          <View style={styles.overlay}>
            <View style={[styles.overlayPiece, { height: (height - frameSize) / 2, width }]} />
            
            <View style={{ flexDirection: 'row' }}>
              <View style={[styles.overlayPiece, { width: (width - frameSize) / 2 }]} />
              <View style={styles.frame} />
              <View style={[styles.overlayPiece, { width: (width - frameSize) / 2 }]} />
            </View>

            <Text style={[styles.QrText]}>Scan your QR code</Text>

            <View style={[styles.overlayPiece, { height: (height - frameSize) / 2, width }]} />
          </View>

          {scanned && (
            <TouchableOpacity onPress={() => setScanned(false)} style={styles.button}>
              <Text style={styles.text}>Tap to Scan Again</Text>
            </TouchableOpacity>
          )}
        </>
      )}
      {!isFocused && (
        <Text style={styles.message}>Camera is off on this screen.</Text>
      )}
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    justifyContent: 'center',
  },
  message: {
    textAlign: 'center',
    paddingBottom: 10,
    fontSize: 18,
    fontWeight: 'bold',
  },
  camera: {
    flex: 1,
  },
  overlay: {
    position: 'absolute',
    top: 0,
    left: 0,
    right: 0,
    bottom: 0,
    justifyContent: 'center',
    alignItems: 'center',
  },
  overlayPiece: {
    backgroundColor: 'rgba(100, 100, 100, 1)',
  },
  frame: {
    width: 250,
    height: 250,
    borderWidth: 4,
    borderColor: 'white',
    borderRadius: 10,
  },
  button: {
    position: 'absolute',
    bottom: 50,
    left: 0,
    right: 0,
    alignItems: 'center',
  },
  text: {
    fontSize: 24,
    fontWeight: 'bold',
    color: 'white',
  },
  QrText: {
    backgroundColor: 'rgba(100, 100, 100, 1)',
    fontSize: 24,
    fontWeight: 'bold',
    color: 'white',
    padding: 10,
    textAlign: 'center',
    width: '100%',
  },
});
