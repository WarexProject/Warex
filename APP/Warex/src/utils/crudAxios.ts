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

export const loginAPI = async (userData: { DNI: string, password: string})  => {
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

export const getDataByQuery = async (data: {sql: string})  => {
    try {
        const response = await axios.post(`${BASEURL}`, data);
        return response.data
    } catch (e) {
        console.log(e);
        return [];
    }
};

export const updateData = async (table: string, id: string, field: string, newData: any) => {
    try {
        const response = await axios.put(`${BASEURL}/${table}?${field}=${id}`, newData);
        return response.data
    } catch (error) {
        return false
    }
};


export const updateFieldData = async (table: string, id: string, field: string, value: any) => {
    try {
        await axios.patch(`${BASEURL}/${table}/${id}`, {[field]: value });
    } catch (error) {
        console.log(error);
    }
};


export const deleteData = async (table: string, field: string, value: string) => {
    try {
        const response = await axios.delete(`${BASEURL}/${table}?${field}=${value}`);
        return response.data
    } catch (error) {
        console.log(error);
    }
};
