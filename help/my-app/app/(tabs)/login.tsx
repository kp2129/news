import React, { useState } from 'react';
import { View, TextInput, Button, Text, Alert, StyleSheet } from 'react-native';
import { Stack } from 'expo-router';

export default function Login() {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [loading, setLoading] = useState(false);

  const handleLogin = async () => {
    // Validation: Ensure email and password are provided
    if (!email || !password) {
      Alert.alert('Error', 'Please enter both email and password.');
      return;
    }

    setLoading(true);

    // Perform API request
    try {
      const response = await fetch('http://localhost:8000/login', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          email: email,
          password: password,
        }),
      });

      const data = await response.json();

      if (response.ok) {
        Alert.alert('Success', 'Login successful!');
        // Handle successful login, e.g., navigate to another screen, save token, etc.
      } else {
        Alert.alert('Error', data.message || 'Login failed');
      }
    } catch (error) {
      Alert.alert('Error', 'An error occurred. Please try again.');
    }

    setLoading(false);
  };

  return (
    <>
      <Stack.Screen options={{ title: 'Login' }} />
      <View style={styles.container}>
        <Text style={styles.text}>Login</Text>

        <TextInput
          style={styles.input}
          placeholder="Email"
          value={email}
          onChangeText={setEmail}
          keyboardType="email-address"
          autoCapitalize="none"
        />
        <TextInput
          style={styles.input}
          placeholder="Password"
          value={password}
          onChangeText={setPassword}
          secureTextEntry={true}
        />

        <Button title={loading ? 'Logging in...' : 'Login'} onPress={handleLogin} disabled={loading} />

        <Text style={styles.signupText}>
          Don't have an account? <Text style={styles.linkText}>Sign up</Text>
        </Text>
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
  text: {
    fontSize: 24,
    color: 'black',
    fontWeight: 'bold',
    marginBottom: 20,
  },
  input: {
    width: '100%',
    height: 40,
    borderColor: 'gray',
    borderWidth: 1,
    marginBottom: 10,
    paddingHorizontal: 10,
  },
  signupText: {
    marginTop: 20,
    fontSize: 16,
  },
  linkText: {
    color: 'blue',
    textDecorationLine: 'underline',
  },
});
