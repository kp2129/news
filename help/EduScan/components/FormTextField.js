import { Text, View, TextInput, StyleSheet } from "react-native";


export default function FormTextField({ label, errors = [], ...rest }) {
    return (
        <View>
            {label && (
                <Text style={styles.label}>
                    {label}
                </Text>
            )}
            <TextInput
                style={styles.textInput}
                autoCapitalize="none"
                {...rest}
            />
            {errors.map((err)=>{
                return <Text key={err} style={styles.errorText}>{err}</Text>
            })}
        </View>
    );
}

const styles = StyleSheet.create({
    label: {
        color: '#334155',
        fontWeight: '500',
    },
    textInput: {
        height: 40,
        borderColor: 'gray',
        borderWidth: 1,
        marginBottom: 10,
        padding: 10,
    }
});