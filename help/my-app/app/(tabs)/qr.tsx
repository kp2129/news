import { Link, Stack } from 'expo-router';
import { StyleSheet, View, Text } from 'react-native';
import QRCode from 'react-native-qrcode-svg';

export default function NotFoundScreen() {

  fetch('http:/localhost', {
    method: 'GET',
    headers: {
      Accept: 'application/json',
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      firstParam: 'yourValue',
      secondParam: 'yourOtherValue',
    }),
  });

  return (
    <>
      <Stack.Screen options={{ title: 'QR' }} />
      <View style={styles.container}>
        <QRCode
          value="http://awesome.link.qr"
        />
        <Text style={styles.message}>Scan the QR code above!</Text>
      </View>
    </>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    alignItems: 'center',
    justifyContent: 'center',
    padding: 20,
    backgroundColor: 'white',
  },
  message: {
    fontSize: 18,
    fontWeight: 'bold',
  },
});
