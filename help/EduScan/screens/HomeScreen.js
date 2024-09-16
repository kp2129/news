import { SafeAreaView, Text, Button } from "react-native";
import { useContext } from "react";
import AuthContext from "../contexts/AuthContexts";
import { logout } from "../services/AuthServices";
import { useNavigation } from '@react-navigation/native';

export default function App() {
    const { user, setUser } = useContext(AuthContext);
    const navigation = useNavigation();
    async function handleLogout() {
        await logout();
        setUser(null);
    }

    return (
        <SafeAreaView>
            <Text>Welcome home, {user.name}</Text>
            <Button
                title="Go to Scanner"
                onPress={() => navigation.navigate('Scanner')}
            />
            <Button title="log out" onPress={handleLogout}>Log out</Button>
            
        </SafeAreaView>
    )
}