import { SafeAreaView, View, StyleSheet, Button, Platform } from "react-native";
import { useState } from "react";
import FormTextField from "../components/FormTextField";
import axios from "axios";

export default function App() {

    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [errors, setErrors] = useState('');

   async function handleLogin() {
        setErrors({});
        try {
            const {data} = await axios.post('http://10.13.25.152:8000/api/login', {
                email,
                password,
                device_name: `${Platform.OS} ${Platform.Version}`,
            }, {
                headers: {
                    'Content-Type': 'application/json',
                },
            });
            
            const {data: user} = await axios.get(`http://10.13.25.152:8000/api/user`,{
                headers: {
                    Accept: 'application/json',
                    Authorization: `Bearer ${data.token}`,
                },
            })
            console.log(user);
        } catch (e) {
            if(e.response?.status === 422){
                setErrors(e.response.data.errors);
            }
        }
    }

    return (
        <SafeAreaView style={styles.wrapper}>
            <View style={styles.container}>
                <FormTextField
                    label="Email address"
                    value={email}
                    onChangeText={(text) => setEmail(text)}
                    keyboardType="email-address"
                    errors={errors.email}
                />
                <FormTextField
                    label="Password"
                    secureTextEntry={true}
                    value={password}
                    onChangeText={(text) => setPassword(text)}
                    errors={errors.password}
                />
                <Button title="Login" onPress={() => handleLogin()} />
            </View>
        </SafeAreaView>
    );
}

const styles = StyleSheet.create({
    wrapper: {
        backgroundColor: '#fff', 
        flex: 1,
    },
    container: {
        padding: 20,
        rowGap: 16,
    },
});
