import { useState } from 'react'

const useContactForm = (initialValues = {
    name: '',
    subject: '',
    email: '',
    message: ''
}) => {
    const [formData, setFormData] = useState(initialValues)
    const [errors, setErrors] = useState({})

    const handleChange = (e) => {
        const { name, value } = e.target
        setFormData(prev => ({ ...prev, [name]: value }))
    }

    const resetForm = () => {
        setFormData(initialValues)
        setErrors({})
    }

    const validate = () => {
        const newErrors = {}
        if (!formData.name.trim()) newErrors.name = 'Name is required'
        if (!formData.subject) newErrors.subject = 'Please select a subject'
        if (!formData.message.trim()) newErrors.message = 'Message is required'
        if (!formData.email || !/\S+@\S+\.\S+/.test(formData.email))
            newErrors.email = 'Valid email is required'

        setErrors(newErrors)
        return Object.keys(newErrors).length === 0
    }

    return {
        formData,
        errors,
        handleChange,
        validate,
        resetForm
    }
}

export default useContactForm