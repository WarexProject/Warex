import axios from 'axios';
export const BASEURL: string = "http://localhost/API";

export const saveData = async (table: string, data: any)  => {
    try {
        const response = await axios.post(`${BASEURL}/${table}`, data);
        return response.data
    } catch (e) {
        console.log(e);
    }
};

export const loginAPI = async (userData: { DNI: string, password: string, companyNIF: string })  => {
    try {
        const response = await axios.post(`${BASEURL}/access?accion=login`, userData);
        return response.data
    } catch (e) {
        console.log(e);
        return null
    }
};

export const getData = async (table: string, field: string, value: string): Promise<Array<any>> => {
    try {
        const response = await axios.get(`${BASEURL}/${table}?${field}=${value}`);
        return response.data.data;
    } catch (error) {
        console.log(error);
        return [];
    }
};

export const updateData = async (table: string, id: string, newData: any) => {
    try {
        await axios.put(`${BASEURL}/${table}/${id}`, newData);
    } catch (error) {
        console.log(error);
    }
};

export const updateFieldData = async (table: string, id: string, field: string, value: any) => {
    try {
        await axios.patch(`${BASEURL}/${table}/${id}`, { [field]: value });
    } catch (error) {
        console.log(error);
    }
};

export const deleteData = async (table: string, id: string) => {
    try {
        await axios.delete(`${BASEURL}/${table}/${id}`);
    } catch (error) {
        console.log(error);
    }
};
